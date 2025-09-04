<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use App\Models\Borrowing;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DashboardController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('create', Book::class);

        // Fetch data for dashboard widgets
        $totalBooks = Book::count();
        $totalStudents = User::where('role', 'student')->count();
        $borrowedBooks = Borrowing::where('status', 'borrowed')->count();

        return view('admin.dashboard', compact('totalBooks', 'totalStudents', 'borrowedBooks'));
    }
}