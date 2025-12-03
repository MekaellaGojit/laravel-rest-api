<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileUploadController;

// // Test Route
// Route::get('/test', function () {
//     return response()->json(['message' => 'API is working']);
// });

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        $dbName = DB::connection()->getDatabaseName();
        return response()->json([
            'status' => 'success',
            'message' => 'Database connected successfully!',
            'database' => $dbName
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Could not connect to database',
            'error' => $e->getMessage()
        ], 500);
    }
});

Route::get('/migrate', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return response()->json([
            'status' => 'success',
            'message' => 'Migrations completed',
            'output' => Artisan::output()
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ], 500);
    }
});

Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

// Products (public)
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/products/search', [App\Http\Controllers\ProductController::class, 'searchByName']);
Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'show']);

// Sales (public)
Route::get('/sales', [App\Http\Controllers\SaleController::class, 'index']);
Route::get('/sales/{id}', [App\Http\Controllers\SaleController::class, 'show']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/upload', [App\Http\Controllers\FileUploadController::class, 'upload']);

    // Logout
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);

    // Product CRUD
    Route::post('/products', [App\Http\Controllers\ProductController::class, 'store']);
    Route::put('/products/{id}', [App\Http\Controllers\ProductController::class, 'update']);
    Route::delete('/products/{id}', [App\Http\Controllers\ProductController::class, 'destroy']);

    // Sales Create/Delete
    Route::post('/sales', [App\Http\Controllers\SaleController::class, 'store']);
    Route::delete('/sales/{id}', [App\Http\Controllers\SaleController::class, 'destroy']);
});
