<?php
require_once 'arqueiro.php';
require_once 'guerreiro.php';
require_once 'mago.php';
require_once 'ladina.php';
require_once 'BattleService.php';

// Criação dos personagens que atacarão 
$personagens = [
    new Mago("Sofia", 10),
    new Ladina("Lira", 8),
    new Arqueiro("Pedro", 12),
];
$guerreiro = new Guerreiro("Grom", 15);

// Criando uma batalha
$batalha = new BattleService();


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