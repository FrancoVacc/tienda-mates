<?php

use App\Http\Controllers\clientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [clientController::class, 'index'])->name('home');
Route::get('/nosotros', [clientController::class, 'about'])->name('about');
Route::get('/contacto', [clientController::class, 'contact'])->name('contact');
Route::get('/tienda', [clientController::class, 'shop'])->name('shop');
Route::get('/cart', [clientController::class, 'cart'])->name('cart');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
