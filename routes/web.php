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

Route::view('/admin', 'livewire/main/admin/inventory')
    ->middleware(['auth', 'verified'])
    ->name('admin.inventory');

// Route::view('/admin/salestransactions', 'livewire/main/admin/salestransactions')

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {
        Route::view('/', 'livewire/main/admin/inventory')->name('inventory');
        Route::view('/inventory', 'livewire/main/admin/inventory');
        Route::view('/salestransactions', 'livewire/main/admin/salestransactions')->name('salestransactions');
        Route::view('/orders', 'livewire/main/admin/orders')->name('orders');
        Route::view('/faqs', 'livewire/main/admin/faqs')->name('faqs');
        Route::view('/reports', 'livewire/main/admin/reports')->name('reports');
    });


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
