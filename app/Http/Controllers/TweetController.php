<?php

namespace App\Http\Controllers;

use Throwable;
use Log;

use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\TweetRequest;

use App\Models\Tweet;
use App\Models\TweetImage;

class TweetController extends Controller
{
    public function index(): View
    {
        $tweets = Tweet::with(['user', 'images'])->orderBy('created_at', 'desc')->get();

        return view('home', compact('tweets'));
    }

    public function store(TweetRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $tweet = new Tweet(['content' => $request->content]);
                $tweet = Auth::user()->tweets()->save($tweet);

                if (empty($request->file('images'))) {
                    return redirect()->route('home');
                }

                foreach ($request->file('images') as $image) {
                    $putFile = Storage::putFile('public/tweet_images', $image, 'public');
                    $filename = pathinfo($putFile)['basename'];
                    $tweetImage = new TweetImage(['filename' => $filename]);
                    $tweet->images()->save($tweetImage);
                }
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        return redirect()->route('home');
    }
}
