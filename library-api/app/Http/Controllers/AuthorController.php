<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $authors = [
        [
            'id' => '1',
            'name' => 'Jane Doe',
            'bio' => 'Expert in modern fiction',
            'nationality' => 'American'
        ],
        [
            'id' => '2',
            'name' => 'John Smith',
            'bio' => 'Award-winning sci-fi author',
            'nationality' => 'British'
        ]
    ];

    public function index()
    {
        return response()->json($this->authors);
    }

    public function show($id)
    {
        $author = collect($this->authors)->firstWhere('id', $id);

        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }

        return response()->json($author);
    }
}
