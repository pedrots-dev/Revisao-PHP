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
// Outros
$inimigos = [
    ["nome" => "Goblin", "forca" => 15, "vida" => 50],
    ["nome" => "Orc", "forca" => 25, "vida" => 80],
    ["nome" => "Troll", "forca" => 40, "vida" => 120]
];


// Code
echo "Quantos itens tem no inventario?";
echo count($personagem["inventario"]);
echo"\n";




echo "Nome do segundo item do inventario?";
echo $personagem["inventario"][1];
echo"\n";




echo "Vida do segundo inimigo?";
echo $inimigos[1]["vida"];
echo"\n";




echo "Nome do primeiro inimigo?";
echo $inimigos[0]["nome"];
echo"\n";



if($personagem["vida"] < 100){
    if(in_array("poção", $personagem["inventario"])) {
        echo "{$personagem["nome"]} possui uma poção no inventario.";
    } else {
        echo "{$personagem["nome"]} não possui uma poção no inventario.";
    }
}

?>
