<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name("home");

Route::get('/back', function () {
    return view('back.index');
})->middleware(['auth', 'verified'])->name('back');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('add_cart', [CartController::class, 'add'])->name('add_cart');

Route::resource("homes", HomeController::class);
Route::resource("menus", MenuController::class)->middleware(['auth', 'verified']);
Route::resource("items", ItemController::class)->middleware(['auth', 'verified']);
Route::resource("orders", OrderController::class)->middleware(['auth', 'verified']);
Route::resource("carts", CartController::class)->middleware(['auth', 'verified']);


require __DIR__ . '/auth.php';
