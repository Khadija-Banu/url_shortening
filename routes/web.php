<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShorteningController;
use App\Http\Middleware\MiddlewareIP;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth,middlewareIP')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('generate-shorten-link',[UrlShorteningController::class,'index']);
Route::post('generate-shorten-link',[UrlShorteningController::class,'store'])->name('generate.shorten.link.post');
Route::get('{code}',[UrlShorteningController::class,'shortLink'])->name('shorten.link');



