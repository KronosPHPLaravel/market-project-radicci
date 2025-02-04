<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Mail\ContactSend;

Route::get('/', [ProductController::class, 'Welcome']);
Route::get('/products', [ProductController::class, 'Category']);
Route::get('/map', [ProductController::class, 'Map']);
Route::get('/details/{element}', [ProductController::class, 'Detail']);
Route::post('/richiesta-informazioni', [ProductController::class, 'send']);
Route::get('/{element}/{item}', [ProductController::class, 'Product']);
