<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserInformationsController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [clientController::class, 'index'])->name('home');
Route::get('/nosotros', [clientController::class, 'about'])->name('about');
Route::get('/contacto', [clientController::class, 'contact'])->name('contact');
Route::post('/contacto', [clientController::class, 'messages'])->name('messages');
Route::get('/tienda', [clientController::class, 'shop'])->name('shop');
Route::get('/categoria/{id}', [clientController::class, 'category'])->name('category');
Route::get('/producto/{id}', [clientController::class, 'product'])->name('producto');


Route::get('/cart', [CartController::class, 'cartShow'])->middleware(['auth', 'verified'])->name('cart');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/userinformation/{user_information}', [UserInformationsController::class, 'update'])->name('userinformation.update');
    Route::put('/address/{address}', [AddressController::class, 'update'])->name('address.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //cart
    Route::post('/cart', [CartController::class, 'addToCart'])->name('addtocart');
    Route::delete('/cart/{id}', [CartController::class, 'itemDelete'])->name('itemdelete');
    Route::patch('/cart/{id}', [CartController::class, 'itemUpdate'])->name('itemupdate');

    //orders
    Route::post('/order', [OrderController::class, 'create'])->name('buycart');
    Route::get('/order', [OrderController::class, 'show'])->name('ordersshow');
    Route::get('/order/my_orders', [OrderController::class, 'myOrders'])->name('myorders');
    Route::get('/order/my_orders/{id}', [OrderController::class, 'order'])->name('order');

    Route::group(['middleware' => ['role:admin']], function () {
        //products
        Route::resource('products', ProductController::class);

        //categories
        Route::resource('categories', CategorieController::class);

        //message
        Route::get('/message', [clientController::class, 'message_show'])->name('messages_show');
        Route::get('/message/{id}', [clientController::class, 'read_message'])->name('messages_read');

        //Customers
        Route::get('/customers', [UserInformationsController::class, 'index'])->name('customers');
    });
});

require __DIR__ . '/auth.php';
