<?php

use App\Http\Controllers\TransaksiPenjualanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;

Route::get('/', function () {
    return view('welcome');
});

// Route resource for products
Route::resource('/products', ProductController::class);


// Route resource for supplier
Route::resource('/supplier', SupplierController::class);

Route::resource('/transaksipenjualan', TransaksiPenjualanController::class);
Route::get('/tambahProduct', [ProductController::class, 'create'])->name('product.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
