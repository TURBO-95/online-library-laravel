<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    /**
     * Handle the action of a student borrowing a book.
     */
    public function store(Request $request, Book $book)
    {
        // Is the book available?
        if ($book->quantity < 1) {
            return back()->with('error', 'Sorry, this book is currently unavailable.');
        }

        // Has the user already borrowed this book and not returned it?
        $existingBorrowing = Borrowing::where('user_id', Auth::id())
                                      ->where('book_id', $book->id)
                                      ->where('status', 'borrowed')
                                      ->exists();

        if ($existingBorrowing) {
            return back()->with('error', 'You have already borrowed this book.');
        }

        
        DB::transaction(function () use ($book) {
            // Decrease the book's quantity
            $book->decrement('quantity');

            // Create the borrowing record
            Borrowing::create([
                'user_id' => Auth::id(),
                'book_id' => $book->id,
                'borrowed_at' => now(),
                'due_date' => now()->addDays(14), // Set a 2-week due date
                'status' => 'borrowed',
            ]);
        });

        return redirect()->route('dashboard')->with('status', 'Book borrowed successfully!');
    }

    /**
     * Handle the action of a student returning a book.
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        
        // Ensure the borrowing record actually belongs to the logged-in user.
        
        if (Auth::id() !== $borrowing->user_id) {
            abort(403); 
        }

        // Check if the book is already returned
        if ($borrowing->status === 'returned') {
            return back()->with('error', 'This book has already been returned.');
        }
        
        DB::transaction(function () use ($borrowing) {
            // Update the borrowing record
            $borrowing->update([
                'status' => 'returned',
                'returned_at' => now(),
            ]);

            // Increase the book's quantity back
            $borrowing->book->increment('quantity');
        });

        return redirect()->route('dashboard')->with('status', 'Book returned successfully!');
    }
}