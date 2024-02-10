<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
        Route::get('/inventory', [ProductController::class, 'index'])->name('inventory');
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
        Route::view('/products', 'livewire/main/user/products')->name('products'); //Guests are allowed to browse products so disable this (for now).
        Route::view('/orders', 'livewire/main/user/orders')->name('orders');
        Route::view('/faqs', 'livewire/main/user/faqs')->name('faqs');
        Route::view('/cart', 'livewire/main/user/cart')->name('cart');
});

// These pages/actions do not require middleware
Route::view('/products', 'livewire/main/user/products')->name('guest.products');
Route::view('/faqs', 'livewire/main/user/faqs')->name('guest.faqs');

// Route::view('admin/edittransactions/{transactionid}', 'livewire/main/admin/edittransactions')->middleware(['auth', 'verified', 'checkadmin'])->name('edittransactions');
Route::get('admin/edittransactions/{transactionId}', [AdminController::class, 'edittransaction'])
    ->middleware(['auth', 'verified', 'checkadmin'])
    ->name('edittransactions');

Route::view('/profile', 'livewire/profile')->name('profile')->middleware(['auth', 'verified']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

require __DIR__.'/auth.php';
