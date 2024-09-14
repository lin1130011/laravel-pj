<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name("home");

Route::get('/back', function () {
    return view('back.index');
})->middleware(['auth', 'verified'])->name('back');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource("menus", MenuController::class)->middleware(['auth', 'verified']);
Route::resource("items", ItemController::class)->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
