<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book; 

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            ['title' => 'The Hobbit'],
            ['title' => 'The Lord of the Rings'],
            ['title' => 'Pride and Prejudice'],
            ['title' => 'To Kill a Mockingbird'],
            ['title' => '1984'],
            ['title' => 'The Great Gatsby'],
            ['title' => 'Moby Dick'],
            ['title' => 'War and Peace'],
            ['title' => 'The Catcher in the Rye'],
            ['title' => 'The Chronicles of Narnia'],
            ['title' => 'Jane Eyre'],
            ['title' => 'Animal Farm'],
            ['title' => 'Gone with the Wind'],
            ['title' => 'The Adventures of Huckleberry Finn'],
            ['title' => 'The Grapes of Wrath'],
            ['title' => 'Brave New World'],
            ['title' => 'Fahrenheit 451'],
            ['title' => 'Dune'],
            ['title' => 'The Hitchhiker\'s Guide to the Galaxy'],
            ['title' => 'The Shining'],
            ['title' => 'Frankenstein'],
            ['title' => 'Dracula'],
            ['title' => 'The Alchemist'],
            ['title' => 'The Road'],
            ['title' => 'The Stand'],
        ];

        foreach ($books as $bookData) {
            
            Book::factory()->create($bookData);
        }
    }
}