<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a list of all available books.
     */
    public function index()
    {
        $books = Book::latest()->paginate(12); 

        return view('student.books.index', compact('books'));
    }

    /**
     * Display the details of a single book.
     */
    public function show(Book $book)
    {
        
        return view('student.books.show', compact('book'));
    }
}