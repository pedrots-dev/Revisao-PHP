<?php
require_once 'model/arqueiro.php';
require_once 'model/guerreiro.php';
require_once 'model/mago.php';
require_once 'model/ladina.php';
require_once 'service/BattleService.php';
require_once 'log/Log.php';

// Criação dos personagens que atacarão 
$personagens = [
    new Mago("Sofia", 10),
    new Ladina("Lira", 8),
    new Arqueiro("Pedro", 12),
];

$guerreiro = new Guerreiro("Grom", 15);

// Escolha do tipo de logger
$logger = new EchoLogger();
// Criando uma batalha
$batalha = new BattleService($logger);


// Todos personagens envolvidos atacam
foreach ($personagens as $p) {
    // Tenta atacar o alvo
    try {
    $resultado = $batalha->atacarAlvo($p, $guerreiro, 5);
    $guerreiro->tomarDano($resultado['danoFinal']);
    $vivo = $guerreiro->estaVivo();

    if($vivo == false){ //se o alvo morreu
        echo "O alvo caiu em batalha!";
        break;
    } else{ //se o alvo ainda está vivo
        echo 'Ataque de ' . $p->exibirStatus(); 
        echo '<br>';
        echo $guerreiro->exibirStatus();
        echo '<br>';
    }
    // Se houver algum erro, ou o personagem morrer: Mostra a mesagem e para o loop
    } catch(Exception $e){
        echo $e->getMessage();
        echo '<br>';
        break;
    };
};


?>