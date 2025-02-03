<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'Welcome']);
Route::get('/products', [ProductController::class, 'Product']);
Route::get('/dove-siamo', [ProductController::class, 'Map']);
Route::get('/details/{element}', [ProductController::class, 'Detail']);