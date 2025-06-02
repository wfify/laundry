<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;

Route::get('/', [LandingPageController::class, 'index'])->name('landing'); // Landing page utama
Route::get('/lokasi', [LandingPageController::class, 'lokasi'])->name('lokasi');

Route::get('/check-order', [LandingPageController::class, 'check'])->name('check.order');
Route::post('/check-order', [LandingPageController::class, 'search'])->name('search.order');

Route::get('/order/{order_code}', [LandingPageController::class, 'detail'])->name('order.detail');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes dengan prefix 'admin' dan middleware auth
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('orders', OrderController::class);

        // CRUD orders
        Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/orders/create', [OrderController::class, 'create'])->name('admin.orders.create');
        Route::post('/orders', [OrderController::class, 'store'])->name('admin.orders.store');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
        Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
        Route::put('/orders/{id}', [OrderController::class, 'update'])->name('admin.orders.update');
        Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
    });
});

require __DIR__.'/auth.php';
