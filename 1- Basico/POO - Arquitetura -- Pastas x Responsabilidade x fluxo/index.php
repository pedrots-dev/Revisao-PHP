<?php
// require_once 'model/Arqueiro.php';
// require_once 'model/Guerreiro.php';
// require_once 'model/Mago.php';
// require_once 'model/Ladina.php';
// require_once 'service/BattleService.php';
// require_once 'log/Log.php';

require_once "autoload.php";

try {
    $container = require_once 'bootstrap/app.php';
    $statusService = $container->make(StatusService::class);
} catch (Exception $e) {
    echo "Erro crítico: " . $e->getMessage();
    exit;
};

// Criação dos personagens que atacarão 
$personagens = [
    new Mago("Sofia", 10),
    new Ladina("Lira", 8),
    new Arqueiro("Pedro", 12),
    new Guerreiro("Grom", 15),
];


// Criando uma batalha
$status = $statusService;

// Todos personagens envolvidos atacam
foreach ($personagens as $p) {

    try {
        $classe = $p->classe;
        if ($classe == "Guerreiro") {
            echo "<br>";
            $p->tomarDano(500);
        };

        $mensagem = $status->getStatus($p);
        echo "Index: " . $mensagem . "<br>";
        // Se houver algum erro, ou o personagem morrer: Mostra a mesagem e para o loop
    } catch (Exception $e) {
        echo $e->getMessage();
        echo '<br>';
        break;
    };
};
