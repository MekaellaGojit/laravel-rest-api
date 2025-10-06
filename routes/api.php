<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Test Route
Route::get('/test', function (Request $request){
    return response()->json(['message'=>'API is working']);
});

// Get all products
Route::get('/products', [App\http\Controllers\ProductController::class, 'index']);

Route::get('/products/search', [ProductController::class, 'searchByName']);

// Get a single product
Route::get('/products/{id}', [App\http\Controllers\ProductController::class, 'show']);

// Create a new product
Route::post('/products', [App\http\Controllers\ProductController::class, 'store']);

// Update an existing product
Route::put('/products/{id}', [App\http\Controllers\ProductController::class, 'update']);

// Delete a product
Route::delete('/products/{id}', [App\http\Controllers\ProductController::class, 'destroy']);

// Toggle product status
// Route::post('/products/{id}/toggle-status', [App\http\Controllers\ProductController::class, 'toggleProductStatus']);






