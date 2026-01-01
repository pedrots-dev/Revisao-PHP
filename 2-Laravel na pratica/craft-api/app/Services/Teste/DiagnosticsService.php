<?php

namespace App\Services\Teste;

use App\Exceptions\ApiException;
use League\CommonMark\Extension\Table\TableRow;

class DiagnosticsService{
    public function health(): array{
        $resposta = [
            'status' => 200,
            'sevice' => 'craft-api',
        ];

        return $resposta;
    }

    public function ping(): array{
        $resposta = [
            'pong' => true
        ];

        return $resposta;
    }

    public function version(): array{
        $resposta = [
            'php' => phpversion(),
            'laravel' => app()->version(),
        ];

        return $resposta;
    }

    public function time():array{
        $resposta = [
            'timezone' => date_default_timezone_get(),
            'now' => date('c'),
        ];

        return $resposta;
    }

    public function requireToken(?string $token):array {
    // Valida se foi enviado token ou não
        if(!$token){
            throw new ApiException(
                'TOKEN_MISSING',
                'Token não enviado',
                '401',
                ['hint' => 'Envie o Token']
            );
        }

        return [
            'token' => $token,
            'valid' => true,
        ];
    }
    public function isNumber($value):array {
        if(is_numeric($value)){
            $resposta = [
                'valor' => $value,
                'isNumber' => true
            ];
            return $resposta;
        } else{
            return throw new ApiException(
                'INVALID_NUMBER',
                'O valor deve ser um numero inteiro',
                '422',
            );
        }
    }

    public function isTrue($value):array {
        if($value == "true"){
            $resposta = [
                'valor' => $value,
                'isTrue' => true
            ];
            return $resposta;
        }else{
            return throw new ApiException(
                'NOT_TRUE',
                'O valor deve ser true',
                '400'
            );
        }
    }
}

?>
