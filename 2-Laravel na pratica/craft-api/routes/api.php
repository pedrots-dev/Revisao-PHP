<?php

use App\Http\Controllers\Api\Teste\DiagnosticsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('teste')
->controller(DiagnosticsController::class)
->group(function(){
    Route::get('/health', 'health');

    Route::get('/ping', 'ping');

    Route::get('/version', 'version');

    Route::get('/time', 'time');

    Route::get('/tokenCheck', 'tokenCheck');

    Route::get('/must-be-number/{value}', 'mustBeNumber');

    Route::get('/must-be-true/{value}', 'mustBeTrue');
});

