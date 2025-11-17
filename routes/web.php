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

// Class Routes
Route::prefix('classes')->group(function () {
    Route::get('/create', [ClassController::class, 'create'])->name('classes.create');
    Route::post('/', [ClassController::class, 'store'])->name( 'classes.store');
    Route::get('/', [ClassController::class, 'index'])->name('classes.index');
    Route::get('/{id}', [ClassController::class, 'show'])->name('classes.show');
    Route::delete('/{id}', [ClassController::class, 'delete'])->name('classes.destroy');
    Route::get('/{id}/edit', [ClassController::class, 'edit'])->name('classes.edit');
    Route::put('/{id}', [ClassController::class, 'update'])->name('classes.update');
});

// Student Routes
Route::prefix('students')->group(function () {
    Route::get('/create',[StudentController::class,'create'])->name('students.create');
    Route::post('/', [StudentController::class, 'store'])->name( 'students.store');
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    Route::get('/{id}', [StudentController::class, 'show'])->name('students.show');
    Route::delete('/{id}', [StudentController::class, 'delete'])->name('students.destroy');
    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/{id}', [StudentController::class, 'update'])->name('students.update');
});

// Subject Routes
Route::prefix('subjects')->group(function () {
    Route::get('/create',[SubjectController::class,'create'])->name('subjects.create');
    Route::post('/', [SubjectController::class, 'store'])->name( 'subjects.store');
    Route::get('/', [SubjectController::class, 'index'])->name('subjects.index');
    Route::get('/{id}', [SubjectController::class, 'show'])->name('subjects.show');
    Route::delete('/{id}', [SubjectController::class, 'delete'])->name('subjects.destroy');
    Route::get('/{id}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::put('/{id}', [SubjectController::class, 'update'])->name('subjects.update');
});
