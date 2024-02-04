<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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

Route::redirect('/', 'login');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('/admin/inventory', 'livewire/main/admin/inventory')
//     ->middleware(['auth', 'verified'])
//     ->name('admin.inventory');

// Route::view('/admin/salestransactions', 'livewire/main/admin/salestransactions')

//, 'isadmin'

// Route::get('/admin/inventory', [AdminController::class, 'inventory'])->name('admin.dashboard');
// Route::get('/user/products', [UserController::class, 'products'])->name('user.products');


// Route::middleware(['auth', 'verified'])
//     ->prefix('admin')
//     ->name('admin.')
//     ->group(function() {
//         // Route::view('/', 'livewire/main/admin/inventory')->name('inventory');
//         Route::view('/inventory', 'livewire/main/admin/inventory')->name('inventory');
//         Route::view('/salestransactions', 'livewire/main/admin/salestransactions')->name('salestransactions');
//         Route::view('/orders', 'livewire/main/admin/orders')->name('orders');
//         Route::view('/faqs', 'livewire/main/admin/faqs')->name('faqs');
//         Route::view('/reports', 'livewire/main/admin/reports')->name('reports');
//     });

// // Route::middleware([])

// Route::middleware(['auth', 'verified'])->group(function() {
//         // Route::view('/', 'livewire/main/admin/inventory')->name('inventory');
//         Route::view('/products', 'livewire/main/user/products')->name('products');
//         Route::view('/orders', 'livewire/main/user/orders')->name('orders');
//         Route::view('/faqs', 'livewire/main/user/faqs')->name('faqs');
//         Route::view('/cart', 'livewire/main/user/cart')->name('cart');
//     });

// Admin routes with middleware protection
Route::middleware(['auth', 'verified', 'checkadmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::view('/inventory', 'livewire/main/admin/inventory')->name('inventory');
        Route::view('/salestransactions', 'livewire/main/admin/salestransactions')->name('salestransactions');
        Route::view('/orders', 'livewire/main/admin/orders')->name('orders');
        Route::view('/faqs', 'livewire/main/admin/faqs')->name('faqs');
        Route::view('/reports', 'livewire/main/admin/reports')->name('reports');
    });

// User routes with middleware protection
Route::middleware(['auth', 'verified'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::view('/products', 'livewire/main/user/products')->name('products');
        Route::view('/orders', 'livewire/main/user/orders')->name('orders');
        Route::view('/faqs', 'livewire/main/user/faqs')->name('faqs');
        Route::view('/cart', 'livewire/main/user/cart')->name('cart');
    });

Route::view('admin/edittransactions', 'livewire/main/admin/edittransactions')->middleware(['auth', 'verified', 'checkadmin'])->name('edittransactions');

Route::view('/profile', 'livewire/profile')->name('profile')->middleware(['auth', 'verified']);

Route::get('/admin/inventory', [ProductController::class, 'index'])->name('admin.inventory');

require __DIR__.'/auth.php';
