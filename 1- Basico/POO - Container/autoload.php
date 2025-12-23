<?php
spl_autoload_register(function ($class) {
    $pastas = [
        'model/',
        'service/',
        'log/',
        'utils/',
    ];

    foreach ($pastas as $pasta) {
        $arquivo = $pasta . $class . '.php';

        if (file_exists($arquivo)) {
            require_once $arquivo;
            return;
        }
    }
});
