<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();

        // Get all borrowings for the user, and also get the 'book' information for each one.
        
        $borrowings = $user->borrowings()->with('book')->latest('borrowed_at')->get();

        $activeBorrowings = $borrowings->where('status', 'borrowed');
        $returnedBorrowings = $borrowings->where('status', 'returned');

        return view('dashboard', compact('activeBorrowings', 'returnedBorrowings'));
    }
}