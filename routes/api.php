<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;

// Test Route
Route::get('/test', function (Request $request){
    return response()->json(['message'=>'API is working']);
});

// Get all products
Route::get('/products', [App\http\Controllers\ProductController::class, 'index']);

// Search Product
Route::get('/products/search', [App\http\Controllers\ProductController::class, 'searchByName']);

// Get a single product
Route::get('/products/{id}', [App\http\Controllers\ProductController::class, 'show']);

// Create a new product
Route::post('/products', [App\http\Controllers\ProductController::class, 'store']);

// Update an existing product
Route::put('/products/{id}', [App\http\Controllers\ProductController::class, 'update']);

// Delete a product
Route::delete('/products/{id}', [App\http\Controllers\ProductController::class, 'destroy']);

// Get Product
Route::get('/sales', [App\http\Controllers\SaleController::class, 'index']);

// Store Sales
Route::post('/sales', [App\http\Controllers\SaleController::class, 'store']);

// Show Sales
Route::get('/sales/{id}', [App\http\Controllers\SaleController::class, 'show']);

// Delete Sales
Route::delete('/sales/{id}', [App\http\Controllers\SaleController::class, 'destroy']);

// Toggle product status
// Route::post('/products/{id}/toggle-status', [App\http\Controllers\ProductController::class, 'toggleProductStatus']);






