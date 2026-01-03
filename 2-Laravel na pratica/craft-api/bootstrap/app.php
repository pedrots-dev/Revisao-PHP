<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
// Exception
use App\Exceptions\ApiException;
use App\Support\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //Aqui serve para padronizar erros especificos
        $exceptions->render(function(ApiException $e, Request $request):JsonResponse {
        //Todos erros que conterem uma classe:
        // ApiException
        // Request

        // Faça isso:
            return ApiResponse::error(
                $e->codeName,
                $e->getMessage(),
                $e->details,
                $e->httpStatus
            );
        });

        $exceptions->render(function(ValidationException $e, Request $request){
            return ApiResponse::error(
                'VALIDATION_ERROR',
                'Dados Inválidos',
                $e->errors(),
                422
            );
        });
    })->create();
