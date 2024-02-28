<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OnlineTransactionController;
use App\Http\Controllers\OnsiteTransactionController;
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

// Admin routes with middleware protection
Route::middleware(['auth', 'verified', 'checkadmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/inventory', [ProductController::class, 'index'])->name('inventory');
        Route::get('/inventory/search', [ProductController::class, 'search'])->name('inventory.search');
        Route::get('/onsitetransactions', [OnsiteTransactionController::class, 'index'])->name('onsitetransactions');
        Route::get('/onsitetransactions/search', [OnsiteTransactionController::class, 'search'])->name('onsitetransactions.search');
        Route::view('/createtransactions', 'livewire/main/admin/createtransactions')->name('createtransactions');
        Route::get('/onlinetransactions', [OnlineTransactionController::class, 'index'])->name('onlinetransactions');
        Route::view('/faqs', 'livewire/main/admin/faqs')->name('faqs');
        Route::view('/reports', 'livewire/main/admin/reports')->name('reports');
    });

// User routes with middleware protection
Route::middleware(['auth', 'verified'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/products', [ProductController::class, 'indexUser'])->name('products'); //Guests are allowed to browse products so disable this (for now).
        Route::get('/products/search', [ProductController::class, 'searchProducts'])->name('products.search');
        Route::view('/orders', 'livewire/main/user/orders')->name('orders');
        Route::view('/faqs', 'livewire/main/user/faqs')->name('faqs');
        Route::view('/cart', 'livewire/main/user/cart')->name('cart');
        Route::view('/checkout', 'livewire/main/user/checkout')->name('checkout');
    });

// These pages/actions do not require middleware (guest)
Route::get('/products', [ProductController::class, 'indexUser'])->name('guest.products');
Route::get('/products/search', [ProductController::class, 'searchProducts'])->name('guest.products.search');
Route::view('/faqs', 'livewire/main/user/faqs')->name('guest.faqs');

// Route::view('admin/edittransactions/{transactionid}', 'livewire/main/admin/edittransactions')->middleware(['auth', 'verified', 'checkadmin'])->name('edittransactions');
Route::get('admin/edittransactions/{transactionId}', [AdminController::class, 'edittransaction'])
    ->middleware(['auth', 'verified', 'checkadmin'])
    ->name('edittransactions');

Route::put('admin/update-transaction/{id}', [AdminController::class, 'updateTransaction'])
    ->middleware(['auth', 'verified', 'checkadmin'])
    ->name('update.transaction');

Route::put('admin/create-transaction', [AdminController::class, 'createTransaction'])
    ->middleware(['auth', 'verified', 'checkadmin'])
    ->name('create.transaction');

Route::get('/get-product-details/{productId}', [ProductController::class, 'getProductDetails']);

Route::view('/profile', 'livewire/profile')->name('profile')->middleware(['auth', 'verified']);

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

require __DIR__ . '/auth.php';
