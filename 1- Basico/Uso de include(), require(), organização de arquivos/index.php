<?php
// “jogo principal”, que usa config + funções

// Import
require_once 'config.php';
require_once 'funcoes.php';

// Code
echo "Status inicial: " . exibirStatus($personagens[0]);
echo "\n";

$newVida = atacar($personagens[0]["vida"], $inimigos[0]["forca"]);
$personagens[0]["vida"] = $newVida;

if (estaVivo($personagens[0])){
    echo "{$personagens[0]["nome"]} Ainda está de pé!";
    $newPersonagem = curar($personagens[0]);
    $personagens[0] = $newPersonagem;
    
    echo "\n";
    echo "Novo status: " . exibirStatus($personagens[0]);
} else{
    echo "{$personagens[0]["nome"]} Caiu em batalha!";
}




?>