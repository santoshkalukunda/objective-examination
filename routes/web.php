<?php

use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['role:super-admin']], function () {
    Route::resource('subjects', SubjectController::class);

    //questions
    Route::get('questions/{subject}', [QuestionController::class, 'index'])->name('questions.index');
    Route::post('questions/{subject}', [QuestionController::class, 'store'])->name('questions.store');
    Route::get('questions/{subject}/{question}', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::put('questions/{subject}/{question}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');

    //examination
    Route::get('examinations', [ExaminationController::class, 'index'])->name('examinations.index');
    
    
    
    Route::get('examinations/generate-email', [ExaminationController::class, 'generateEmail'])->name('examinations.generateEmail');
    
});

Route::post('examinations/{user}/{token}', [ExaminationController::class, 'store'])->name('examinations.store');
Route::get('examinations/{user}/{token}', [ExaminationController::class, 'generateUrl'])->name('examinations.generateUrl');