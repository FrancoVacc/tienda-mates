<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [clientController::class, 'index'])->name('home');
Route::get('/nosotros', [clientController::class, 'about'])->name('about');
Route::get('/contacto', [clientController::class, 'contact'])->name('contact');
Route::post('/contacto', [clientController::class, 'messages'])->name('messages');
Route::get('/tienda', [clientController::class, 'shop'])->name('shop');
Route::get('/categoria/{id}', [clientController::class, 'category'])->name('category');
Route::get('/producto/{id}', [clientController::class, 'product'])->name('producto');
Route::get('/cart', [clientController::class, 'cart'])->name('cart');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //products
    Route::resource('products', ProductController::class);

    //categories
    Route::resource('categories', CategorieController::class);

    //message
    Route::get('/message', [clientController::class, 'message_show'])->name('messages_show');
    Route::get('/message/{id}', [clientController::class, 'read_message'])->name('messages_read');
});

require __DIR__ . '/auth.php';
