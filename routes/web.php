<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OnlineTransactionController;
use App\Http\Controllers\OnsiteTransactionController;
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\UserController;
use App\Livewire\Main\Admin\Livewire\DashboardMain;
use App\Models\Cart;
// use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::redirect('/', '/products');

// Admin routes with middleware protection
Route::middleware(['auth', 'verified', 'checkadmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('livewire.main.admin.livewire.dashboard-main')->render();
        })->name('dashboard');
        Route::get('/inventory', [ProductController::class, 'index'])->name('inventory');
        Route::get('/inventory/search', [ProductController::class, 'search'])->name('inventory.search');
        Route::get('/onsitetransactions', [OnsiteTransactionController::class, 'index'])->name('onsitetransactions');
        Route::get('/onsitetransactions/search', [OnsiteTransactionController::class, 'search'])->name('onsitetransactions.search');
        Route::view('/createtransactions', 'livewire/main/admin/createtransactions')->name('createtransactions');
        Route::get('/onlinetransactions', [OnlineTransactionController::class, 'index'])->name('onlinetransactions');
        Route::get('/onlinetransactions/search', [OnlineTransactionController::class, 'search'])->name('onlinetransactions.search');
        Route::view('/faqs', 'livewire/main/admin/faqs')->name('faqs');
        Route::get('/reports', function () {
            return view('livewire.main.admin.reports');
        })->name('reports');
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
        Route::get('/cart', function () {
            $user = auth()->user();
            $cartNotEmpty = $user->carts->isNotEmpty();
            return view('livewire.main.user.cart', compact('cartNotEmpty'));
        })->name('cart');
        Route::get('/checkout', function () {
            $cartEntries = Cart::where('user_id', Auth::id())->get();
            foreach ($cartEntries as $cartEntry) {
                if ($cartEntry->quantity > $cartEntry->product->stockquantity) {
                    return redirect()->route('user.cart')->with('error', 'Some items exceed available stocks.');
                }
            }
            return view('livewire.main.user.checkout');
        })->name('checkout');
        Route::post('/checkout', [CheckoutController::class, 'submit'])->name('checkout.submit');
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

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::view('/login', 'livewire/pages/auth/login')->name('login');

require __DIR__ . '/auth.php';
