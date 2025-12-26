<?php

namespace App\Services\Teste;

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
}

?>
