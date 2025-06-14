<?php
// user
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $users = [
        [
            'id' => '1',
            'name' => 'Alice',
            'email' => 'alice@example.com',
            'membershipDate' => '2023-01-01'
        ],
        [
            'id' => '2',
            'name' => 'Bob',
            'email' => 'bob@example.com',
            'membershipDate' => '2024-03-15'
        ]
    ];

    public function index()
    {
        return response()->json($this->users);
    }

    public function show($id)
    {
        $user = collect($this->users)->firstWhere('id', $id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }
}
