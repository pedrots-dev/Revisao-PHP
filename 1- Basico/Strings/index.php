<?php
// Personagem
$personagem = [
    "nome" => "Pedro",
    "classe" => "Arqueiro",
    "nivel" => 12,
    "vida" => 100,
    "isVivo" => true,
    "inventario" => ["espada", "poção", "escudo", "arco", "flecha"]
];
// code

$status = "O personagem {$personagem["nome"]} " . "({$personagem["classe"]}) " . "- " . "Nível {$personagem["nivel"]} " . "-" . " Vida: {$personagem["vida"]}";

echo "Texto inicial: " . "\n" . $status . "\n";

echo "Maiúsculas: " . strtoupper($status) . "\n";

echo "Essa mensagem tem " . strlen($status) . " caracteres" . "\n";

$posicao = strpos($status, "Arqueiro");
if ($posicao !== false) {
    echo "A palavra 'Arqueiro' foi encontrada na posição: " . $posicao . "\n";
} else {
    echo "A palavra 'Arqueiro' não foi encontrada." . "\n";
}



?>