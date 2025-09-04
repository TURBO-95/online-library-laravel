<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;

/*
|
| Admin Routes
|
*/

Route::prefix('admin')
     ->name('admin.')
     ->middleware(['auth', 'verified'])
     ->group(function () {

        // Admin Dashboard Route
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Admin Book Management Resource Routes
        Route::resource('books', BookController::class);

        // Admin Student Management Routes
        Route::get('/students', [StudentController::class, 'index'])->name('students.index');
        Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
});