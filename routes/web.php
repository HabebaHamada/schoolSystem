<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;

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

// Student Routes
Route::prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    Route::get('/{id}', [StudentController::class, 'show'])->name('students.show');
});

// Class Routes
Route::prefix('classes')->group(function () {
    Route::get('/', [ClassController::class, 'index'])->name('classes.index');
    Route::get('/{id}', [ClassController::class, 'show'])->name('classes.show');
    Route::delete('/{id}', [ClassController::class, 'deleteClass'])->name('classes.destroy');
    Route::get('/{id}/edit', [ClassController::class, 'editClass'])->name('classes.edit');
    Route::post('/', [ClassController::class, 'createClass'])->name('classes.create');
});

// Subject Routes
Route::prefix('subjects')->group(function () {
    Route::get('/', [SubjectController::class, 'index'])->name('subjects.index');
    Route::get('/{id}', [SubjectController::class, 'show'])->name('subjects.show');
});
