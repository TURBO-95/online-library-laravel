<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->role === 'admin';
    }

    public function rules(): array
    {
        $book = $this->route('book');
        return [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => ['required', 'string', 'max:20', Rule::unique('books')->ignore($book->id)],
            'genre' => 'nullable|string|max:100',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ];
    }
}