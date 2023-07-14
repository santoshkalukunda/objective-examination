<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Subject;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Subject $subject, Question $question = null)
    {
        if (!$question) {
            $question = new Question();
        }
        $questions = $subject
            ->questions()
            ->latest()
            ->get();
        return view('question.index', compact('question', 'questions', 'subject'));
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
    public function store(StoreQuestionRequest $request, Subject $subject)
    {
        $subject->questions()->create($request->validated());
        return redirect()
            ->route('questions.index', $subject)
            ->with('success', 'Questions Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject, Question $question)
    {
        return $this->index($subject, $question);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Subject $subject, Question $question)
    {
        $question->update($request->validated());
        return redirect()
            ->route('questions.index', $subject)
            ->with('success', 'Question Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()
            ->back()
            ->with('Question Deleted');
    }
}
