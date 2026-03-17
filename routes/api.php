<?php
// routes/api.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\PolicyController;
use App\Http\Controllers\Api\AuthController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

Route::get('/products', [ProductController::class,'index']);


/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class,'logout']);

    Route::get('/quotes', [QuoteController::class,'index']);
    Route::post('/quotes', [QuoteController::class,'store']);

    Route::get('/policies', [PolicyController::class,'index']);
    Route::post('/policies', [PolicyController::class,'store']);

});