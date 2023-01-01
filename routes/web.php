<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionModelController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ManageTestController;

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

// manage question
Route::group(['prefix' => 'manage-questions', 'as' => 'manage-questions.'], function () {
    Route::get('/', [QuestionModelController::class, 'index'])->name('index');

    Route::post('/add', [QuestionModelController::class, 'store'])->name('add');

    Route::get('/edit/{QuestionID}', [QuestionModelController::class, 'edit'])->name('edit');
    Route::post('/update/{QuestionID}', [QuestionModelController::class, 'update'])->name('update');

    Route::get('/delete/{QuestionID}', [QuestionModelController::class, 'destroy'])->name('destroy');
});


// manage users
Route::group(['prefix' => 'manage-users', 'as' =>  'manage-users.'], function (){

    Route::get('/', [ManageUserController::class, 'index'])->name('index');

    Route::post('/add', [ManageUserController::class, 'store'])->name('add');

    Route::get('/edit/{UserID}', [ManageUserController::class, 'edit'])->name('edit');
    Route::post('/update/{UserID}', [ManageUserController::class, 'update'])->name('update');

    Route::get('/edit-role/{UserID}', [ManageUserController::class, 'editRole'])->name('edit-role');
    Route::get('/edit-credential/{UserID}', [ManageUserController::class, 'editCredential'])->name('edit-credential');

    Route::get('/delete/{UserID}', [ManageUserController::class, 'destroy'])->name('destroy');
});

// manage test
Route::group(['prefix' => 'manage-tests', 'as' => 'manage-tests.'], function (){

    Route::get('/', [ManageTestController::class, 'index'])->name('index');

    Route::get('/start-test', [ManageTestController::class, 'startTest'])->name('start-test');

    Route::post('/submit-answer', [ManageTestController::class, 'submitAnswer'])->name('submit-answer');
});

require __DIR__.'/auth.php';
