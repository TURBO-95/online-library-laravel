<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// --- Controller Imports ---
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\BookController as StudentBookController;
use App\Http\Controllers\Student\BorrowingController as StudentBorrowingController;

/*
|
| Web Routes
|
*/

// Public welcome page
Route::get('/', function () {
    return view('welcome');
});


// === STUDENT ROUTES ===
Route::middleware(['auth', 'verified'])->group(function () {
    
    // The main student dashboard
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');

    // Browse and view books
    Route::get('/books', [StudentBookController::class, 'index'])->name('books.index');
    Route::get('/books/{book}', [StudentBookController::class, 'show'])->name('books.show');

    // Actions of borrowing
    Route::post('/books/{book}/borrow', [StudentBorrowingController::class, 'store'])->name('books.borrow');
    Route::patch('/borrowings/{borrowing}/return', [StudentBorrowingController::class, 'update'])->name('borrowings.return');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Loading admin routes.
require __DIR__.'/admin.php';

require __DIR__.'/auth.php';