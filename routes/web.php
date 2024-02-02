<?php

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

Route::redirect('/', 'login');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('/admin/inventory', 'livewire/main/admin/inventory')
    ->middleware(['auth', 'verified'])
    ->name('admin.inventory');

// Route::view('/admin/salestransactions', 'livewire/main/admin/salestransactions')

//, 'isadmin'

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {
        // Route::view('/', 'livewire/main/admin/inventory')->name('inventory');
        Route::view('/inventory', 'livewire/main/admin/inventory')->name('inventory');
        Route::view('/salestransactions', 'livewire/main/admin/salestransactions')->name('salestransactions');
        Route::view('/orders', 'livewire/main/admin/orders')->name('orders');
        Route::view('/faqs', 'livewire/main/admin/faqs')->name('faqs');
        Route::view('/reports', 'livewire/main/admin/reports')->name('reports');
    });

// Route::middleware([])

Route::middleware(['auth', 'verified'])->group(function() {
        // Route::view('/', 'livewire/main/admin/inventory')->name('inventory');
        Route::view('/products', 'livewire/main/user/products')->name('products');
        Route::view('/orders', 'livewire/main/user/orders')->name('orders');
        Route::view('/faqs', 'livewire/main/user/faqs')->name('faqs');
        Route::view('/cart', 'livewire/main/user/cart')->name('cart');
    });

Route::view('/profile', 'livewire/profile')->name('profile')->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
