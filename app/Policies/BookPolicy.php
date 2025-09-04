<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookPolicy
{
    /**
     * Determine whether the user can view any models.
     * ONLY ADMINS can see the book list in the admin panel.
     */
    public function viewAny(User $user): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny('You do not have permission to view this page.');
    }

    /**
     * Determine whether the user can view the model.
     * All authenticated users can view a single book's details.
     */
    public function view(User $user, Book $book): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     * Only an admin can create a new book.
     */
    public function create(User $user): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny('You do not have permission to create books.');
    }

    /**
     * Determine whether the user can update the model.
     * Only an admin can update a book.
     */
    public function update(User $user, Book $book): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny('You do not have permission to update books.');
    }

    /**
     * Determine whether the user can delete the model.
     * Only an admin can delete a book.
     */
    public function delete(User $user, Book $book): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny('You do not have permission to delete books.');
    }

    public function restore(User $user, Book $book): bool
    {
        return false;
    }

    public function forceDelete(User $user, Book $book): Response
    {
        return false;
    }
}