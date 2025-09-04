<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StudentController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        // Authorize that the user is an admin
        $this->authorize('create', \App\Models\Book::class);

        $query = User::where('role', 'student');

            // Implement search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $searchTerm . '%')
                  ->orWhere('id', $searchTerm); 
            });
        }

        $students = $query->latest()->paginate(10);

        return view('admin.students.index', compact('students'));
    }

    public function show(User $student)
    {
        // Authorize that the user is an admin and ensure we are only viewing students.
        $this->authorize('create', \App\Models\Book::class);
        if ($student->role !== 'student') {
            abort(404); 
        }

        // Load the user's borrowing history with the related book details
        $student->load(['borrowings' => function ($query) {
            $query->with('book')->latest('borrowed_at');
        }]);

        return view('admin.students.show', compact('student'));
    }
}