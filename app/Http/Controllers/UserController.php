<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = [
            [20201576, 'Alice', 'alice@example.com'],
            [20201577, 'Bob', 'bob@example.com'],
            [20201578, 'Charlie', 'charlie@example.com'],
        ];
        return view('users.index', compact('users'));
    }
}