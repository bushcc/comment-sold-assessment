<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Column;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('products', function(Builder $builder) {
//     if (request()->ajax()) {
//         return DataTables::of(Product::query())->toJson();
//     }
//
//     $html = $builder->columns([
//         Column::make('product_name'),
//         Column::make('style'),
//         Column::make('brand'),
//     ]);
//
//     return view('products.index', compact('html'));
// })->name('products.index');

Route::get('products', [ProductsController::class, 'index'])->name('products.index');
Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');

// Route::get('orders', [DashboardController::class, 'index'])->name('orders.index');
// Route::get('users', [DashboardController::class, 'index'])->name('users.index');

// Route::get('products.create', function() {
//     return view('products.create');
// })->name('products.create');
// Route::post('products.store', [ProductsController::class, 'store'])->name('products.store');
// Route::get('products.delete', [ProductsController::class, 'store'])->name('products.delete');
