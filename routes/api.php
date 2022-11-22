<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/product/properties/{product_id}', [ProductController::class, 'getPropertyValues'])
    ->name('properties');
Route::get('/product/uniqueProperties/{category_name}', [ProductController::class, 'getUniqueProductsPropertyByCategory'])
    ->name('uniqueProperties');
