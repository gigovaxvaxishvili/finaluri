<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', MainController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/acc', [AdminController::class, 'index']);
Route::get('/quiz/{id}', [MainController::class, 'show']);
Route::post('create', [MainController::class, 'store']);
Route::get('create-question', [QuestionController::class, 'create']);
Route::post('create-question', [QuestionController::class, 'store']);
Route::delete('/question/{id}', [QuestionController::class, 'destroy']);
Route::get('/edit-question/{id}', [QuestionController::class, 'edit']);
Route::put('/edit-question/{id}', [QuestionController::class, 'update']);
Route::get('/edit-quiz/{id}', [MainController::class, 'edit']);
Route::put('/edit-quiz/{id}', [MainController::class, 'update']);
Route::patch('/approve/{id}', [MainController::class, 'approve']);
Route::delete('/delete-quiz/{id}', [MainController::class, 'destroy']);


Route::get('/quizzes-api/{id}', function($id){
    $questions = Question::where('id', $id)->get();
    return $questions;
});
Route::get('/quiz-api/{id}', function($id){
    $quiz = Question::where('quiz_id', $id)->orderBy('position', 'asc')->get();
    return $quiz;
});
