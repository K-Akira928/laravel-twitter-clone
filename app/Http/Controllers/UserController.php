<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\UserUpdateRequest;

use App\Models\User;
use App\Models\UserHeader;
use App\Models\UserIcon;

class UserController extends Controller
{
    public function show(string $id): View
    {
        $user = User::with(['icon', 'tweets', 'tweets.images'])->orderBy('created_at', 'desc')->findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function edit(string $id): View
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $user = Auth::user();
                $user->update([
                    'name' => $request->name,
                ]);

                if ($request->hasFile('header')) {
                    $putFIle = Storage::putFile('/public/user_headers', $request->file('header'), 'public');
                    $filename = pathinfo($putFIle)['basename'];
                    $header = new UserHeader(['filename' => $filename]);
                    $user->header()->save($header);
                }

                if ($request->hasFile('icon')) {
                    $putFIle = Storage::putFile('/public/user_icons', $request->file('icon'), 'public');
                    $filename = pathinfo($putFIle)['basename'];
                    $icon = new UserIcon(['filename' => $filename]);
                    $user->header()->save($icon);
                }
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        return redirect()->route('users.show', ['id' => Auth::id()]);
    }
}
