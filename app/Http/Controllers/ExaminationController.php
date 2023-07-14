<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use App\Http\Requests\StoreExaminationRequest;
use App\Http\Requests\UpdateExaminationRequest;
use App\Mail\sendQuestionToStudentEmail;
use App\Models\Question;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;

class ExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExaminationRequest $request, User $user, $token)
    {
        $questions = $request->question;
        $answers = $request->answers;

        foreach ($questions as $question) {
            $user->examinations()->create([
                'question_id' => $question,
                'ans' => $answers[$question] ?? null,
                'token' => $token,
            ]);
        }
        return 'your Answers submited';
    }

    /**
     * Display the specified resource.
     */
    public function show(Examination $examination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Examination $examination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExaminationRequest $request, Examination $examination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Examination $examination)
    {
        //
    }

    public function generateEmail()
    {
        $users = User::role('student')->get(); // Assuming you have a User model

        foreach ($users as $user) {
            $studentQuestionToken = $user->studentQuestionToken()->create([
                'token' => Str::random(60),
            ]);
            $token = $studentQuestionToken->token;
            Mail::to($user->email)->send(new sendQuestionToStudentEmail($user, $token));
        }
        return redirect()
            ->back()
            ->with('success', 'Mail Sent');
    }

    public function generateUrl(User $user, $token)
    {
        try {
            if (
                $user
                    ->examinations()
                    ->where('token', $token)
                    ->count()
            ) {
                return 'You have already submited';
            } else {
                //code...
                $studentQuestionToken = $user
                    ->studentQuestionToken()
                    ->where('token', $token)
                    ->first();
                if ($token == $studentQuestionToken->token) {
                    $physicsQuestions = Question::where('subject_id', '1')
                        ->Active()
                        ->inRandomOrder()
                        ->take(5)
                        ->get();
                    $chemistryQuestions = Question::where('subject_id', '2')
                        ->Active()
                        ->inRandomOrder()
                        ->take(5)
                        ->get();
                    return view('examination.index', compact('physicsQuestions', 'chemistryQuestions', 'token', 'user'));
                } else {
                    return abort(404);
                }
            }
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
}
