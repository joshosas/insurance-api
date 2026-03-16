<?php
// routes/api.php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PolicyController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\QuoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/test', function() {
    return response()->json([
        'message' => 'Hey! just checking if my API is working'
    ]);
});

Route::get('/products', [ProductController::class,'index']);

Route::get('/quotes', [QuoteController::class,'index']);
Route::post('/quotes', [QuoteController::class,'store']);

Route::get('/policies', [PolicyController::class, 'index']);
Route::post('/policies', [PolicyController::class,'store']);

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth:sanctum');
