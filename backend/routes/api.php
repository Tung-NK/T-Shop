<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductBrowseController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Products routes
Route::get('/products', [ProductBrowseController::class, 'index']);
Route::get('/products/{category}/category', [ProductBrowseController::class, 'filterProductsByCategory']);
Route::get('/products/{brand}/brand', [ProductBrowseController::class, 'filterProductsByBrand']);
Route::get('/products/{color}/color', [ProductBrowseController::class, 'filterProductsByColor']);
Route::get('/products/{size}/size', [ProductBrowseController::class, 'filterProductsBySize']);
Route::get('/products/{searchTerm}/find', [ProductBrowseController::class, 'findProductsByTerm']);
Route::get('/products/{product}/show', [ProductBrowseController::class, 'show']);
