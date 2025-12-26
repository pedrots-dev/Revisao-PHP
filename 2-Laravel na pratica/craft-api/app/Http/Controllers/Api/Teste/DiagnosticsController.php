<?php

namespace App\Http\Controllers\Api\Teste;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ReturnTypeWillChange;

// Service:
use App\Services\Teste\DiagnosticsService;
use function PHPUnit\Framework\returnArgument;

class DiagnosticsController extends Controller
{
    public function __construct(
        private readonly DiagnosticsService $diagnosticsService
    ) {}

    //Controller para testar as rotas
    public function health(){
        $resposta = $this->diagnosticsService->health();

        return response()->json($resposta, 200);
    }

    public function ping(){
        $resposta = $this->diagnosticsService->ping();

        return response()->json($resposta, 200);
    }

    public function version(){
        $resposta = $this->diagnosticsService->version();

        return response()->json($resposta, 200);
    }

    public function time(){
        $resposta = $this->diagnosticsService->time();

        return response()->json($resposta, 200);
    }

}
