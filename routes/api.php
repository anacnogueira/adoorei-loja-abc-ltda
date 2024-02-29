<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Products
Route::get('products', [ProductController::class, 'index']);

// Sales
Route::get('sales', [SaleController::class, 'index']);
Route::post('sales', [SaleController::class, 'store']);
Route::get('sales/{id}', [SaleController::class, 'show']);
Route::delete('sales/{id}', [SaleController::class, 'destroy']);

// Sale Products
Route::post('sales/{id}/add-products', [SaleProductController::class, 'store']);