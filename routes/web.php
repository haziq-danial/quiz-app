<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionModelController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('Dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => 'manage-questions', 'as' => 'manage-questions.'], function () {
    Route::get('/', [QuestionModelController::class, 'index'])->name('index');

    Route::post('/add', [QuestionModelController::class, 'store'])->name('add');

    Route::get('/edit/{QuestionID}', [QuestionModelController::class, 'edit'])->name('edit');
    Route::post('/update/{QuestionID}', [QuestionModelController::class, 'update'])->name('update');
});

require __DIR__.'/auth.php';
