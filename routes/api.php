<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::prefix('v1')->group(function () {
    Route::apiResource('todos', TodoController::class);
});

// Test route
Route::get('/test', function() {
    return response()->json(['message' => 'API is working']);
});