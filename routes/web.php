<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::middleware(['auth', 'verified:login'])->group(function () {
    Route::get('/home', [TweetController::class, 'index'])->name('home');

    Route::get('/tweets/{id}', [TweetController::class, 'show'])->name('tweets.show');
    Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
    Route::delete('/tweets/{id}', [TweetController::class, 'destroy'])->name('tweets.destroy');

    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
