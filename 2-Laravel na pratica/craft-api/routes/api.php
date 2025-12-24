<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('teste')->group(function(){
    Route::get('/health', function () {
        return response()->json([
            'status' => 200,
            'service' => 'craft-api',
        ]);
    });

    Route::get('/ping', function(){
        return response()->json([
            'pong' => true,
        ]);
    });

    Route::get('/version', function(){
        return response()->json([
            'php' => phpversion(),
            'laravel' => app()->version(),
        ]);
    });
});

