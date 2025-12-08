<?php
// Persnagem
$nome = "Pedro";
$classe = "Arqueiro";
$nivel = 12;
$vida = 100;
$isVivo = true;
// Outros
$danoRecebido = 30;


// Code
echo "$nome é ";
switch ($classe){
    case "Guerreiro":
        echo "Forte e resistente.";
        break;
    case "Arqueiro":
        echo "Ágil e preciso.";
        break;
    case "Mago":
        echo "Sábio e poderoso.";
        break;
    default:
        echo "Classe desconhecida.";
        break;
}

echo "\n";
$vida = $vida - $danoRecebido;

if ($vida > 50){
    echo "$nome ainda luta firme!";
} elseif ($vida < 50 && $vida > 0){
    echo "$nome está ferido, mas continua em pé!";
} elseif ($vida <= 0){
    echo "$nome caiu em batalha";
    $isVivo = false;
}

echo "\n";
echo "Estado atual: ";
if ($isVivo){
    echo "Vivo";
} else {
    echo "Morto";
}



?>
