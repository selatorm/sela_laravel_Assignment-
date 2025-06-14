<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    private $books = [
        [
            'id' => '1',
            'title' => 'Laravel for Beginners',
            'authorId' => '1',
            'isbn' => '1234567890',
            'publicationYear' => 2022,
            'genre' => 'Programming',
            'availableCopies' => 5
        ],
        // Add more books if needed
    ];

    public function index()
    {
        return response()->json($this->books);
    }

    public function show($id)
    {
        $book = collect($this->books)->firstWhere('id', $id);

        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        return response()->json($book);
    }
}
