<?php
// routes/api.php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/user', function(Request $request) {
//     return $request->user();
// });

Route::get('/test', function() {
    return response()->json([
        'message' => 'Hey! just checking if my API is working'
    ]);
});