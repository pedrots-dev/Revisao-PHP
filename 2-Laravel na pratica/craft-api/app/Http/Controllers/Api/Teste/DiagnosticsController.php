<?php

namespace App\Http\Controllers\Api\Teste;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ReturnTypeWillChange;

// Service:
use App\Services\Teste\DiagnosticsService;

use function PHPUnit\Framework\returnArgument;

// Support:
use App\Support\ApiResponse;

class DiagnosticsController extends Controller
{
    public function __construct(
        private readonly DiagnosticsService $diagnosticsService
    ) {}

    //Controller para testar as rotas
    public function health(){
        $resposta = $this->diagnosticsService->health();

        return ApiResponse::ok($resposta);
    }

    public function ping(){
        $resposta = $this->diagnosticsService->ping();

        return ApiResponse::ok($resposta);
    }

    public function version(){
        $resposta = $this->diagnosticsService->version();

        return ApiResponse::ok($resposta);
    }

    public function time(){
        $resposta = $this->diagnosticsService->time();

        return ApiResponse::ok($resposta);
    }

    public function tokenCheck(Request $request){

        $validar = $this->diagnosticsService->requireToken($request->Token);

        return ApiResponse::ok($validar);
    }

    public function mustBeNumber(Request $request, $value){
        $resposta = $this->diagnosticsService->isNumber($value);
        return ApiResponse::ok($resposta);
    }

    public function mustBeTrue(Request $request, $value){
        $resposta = $this->diagnosticsService->isTrue($value);
        return ApiResponse::ok($resposta);
    }
}
