<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\User;

class UserController extends Controller
{
    public function show(string $id): View
    {
        $user = User::with(['icon', 'tweets', 'tweets.images'])->orderBy('created_at', 'desc')->findOrFail($id);

        return view('users.show', compact('user'));
    }
}
