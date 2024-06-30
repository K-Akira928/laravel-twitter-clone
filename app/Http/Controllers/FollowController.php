<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Follow;

class FollowController extends Controller
{
    public function store(Follow $follow, Request $request)
    {
        $follow->create([
            'follower_id' => Auth::user()->id,
            'followed_id' => $request->followed_id
        ]);

        return redirect()->route('home');
    }

    public function destroy(string $id)
    {
        $follow = Follow::where('followed_id', $id)->where('follower_id', Auth::id())->first();
        $follow->delete();

        return redirect()->route('home');
    }
}
