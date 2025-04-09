<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

use App\Mail\OrderConfirmationMail;

use Illuminate\Support\Facades\Mail;

// Customer Routes
Route::get('/', function () {
    return view('welcome');
})->name('landingPage');

Route::get('/order-pizza', function () {
    return view('_customer.order');
})->name('order-pizza');

Route::post('/order-pizza', [OrderController::class, 'order'])->name('postOrder');

Route::get('/order/confirm/{token}', [OrderController::class, 'confirmOrder'])->name('confirmOrder');

Route::get('order/confirmed', function() {
    return view('_customer.success');
})->name('order.success');

Route::get('order/error', function() {
    return view('_customer.error');
})->name('order.error');

// --------------------------------//

// Admin Routes
Route::get('/login', function () {
    return view('_auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['CheckUser'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'fetchOrders'])->name('dashboard');

    Route::get('/view-order/{id}', [AdminController::class, 'fetchSpecificOrder'])->name('viewOrder');

    Route::post('/order/{id}/complete', [AdminController::class, 'completeOrder'])->name('completeOrder');

});

