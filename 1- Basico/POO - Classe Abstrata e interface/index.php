<?php
require_once 'arqueiro.php';
require_once 'guerreiro.php';
require_once 'mago.php';
require_once 'ladina.php';

$personagens = [
    new Mago("Sofia", 10),
    new Guerreiro("Grom", 15),
    new Ladina("Lira", 8),
    new Arqueiro("Pedro", 12),
];

foreach ($personagens as $p) {
    echo $p->exibirStatus() . "\n";
}


?>