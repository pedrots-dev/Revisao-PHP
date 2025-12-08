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

function exibirStatus(array $personagem): string {

    $status = "O personagem {$personagem["nome"]} " . "({$personagem["classe"]}) " . "- " . "Nível {$personagem["nivel"]} " . "-" . " Vida: {$personagem["vida"]}";

    return $status;
};

function atacar(int $vidaDoInimigo, int $forca): int {
    return $vidaDoInimigo - $forca;
};

function curar(array $personagem, int $qnt = 20): array {
    $personagem["vida"] += $qnt;
    return $personagem;
}

function estaVivo(array $personagem): bool{
    if ($personagem["vida"] > 0) {
        return true;
    } else {
        return false;
    }
}

echo "Status do personagem: " . exibirStatus($personagem) . "\n";
echo "O status tem isso de caracteres: " . strlen(exibirStatus($personagem)) . "\n";
?>