<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\QuestionController;

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/survey/create', [SurveyController::class, 'create'])->name('survey.create');
Route::post('/survey/create', [SurveyController::class, 'store'])->name('survey.store');
Route::get('/survey/{survey}', [SurveyController::class, 'show'])->name('survey.show');
Route::delete('/survey/{survey}/delete-questions', [SurveyController::class, 'deleteQuestions'])->name('survey.delete_questions');
Route::get('/dashboard', [SurveyController::class, 'dashboard'])->name('dashboard');


Route::get('/survey/{survey}/question/create', [QuestionController::class, 'create'])->name('question.create');
Route::post('/survey/{survey}/question/create', [QuestionController::class, 'store'])->name('question.store');


Route::get('/survey/take/{survey}-{slug}', [SurveyController::class, 'take'])->name('survey.take');
Route::post('/survey/take/{survey}-{slug}', [SurveyController::class, 'takeStore'])->name('survey.takeStore');
