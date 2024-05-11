<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\TweetRequest;

use App\Models\User;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function index(): View
    {
        return view('home');
    }

    public function store(TweetRequest $request)
    {
        $tweet = new Tweet(['content' => $request->content]);
        Auth::user()->tweets()->save($tweet);

        return redirect()->route('home');
    }
}
