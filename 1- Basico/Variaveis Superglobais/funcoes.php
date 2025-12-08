<?php
// funções tipo exibirStatus, atacar, curar, estaVivo
function exibirStatus(array $personagem): string
{

    $status = "O personagem {$personagem["nome"]} " . "({$personagem["classe"]}) " . "- " . "Nível {$personagem["nivel"]} " . "-" . " Vida: {$personagem["vida"]}";

    return $status;
};

function atacar(int $vidaDoInimigo, int $forca): int
{
    return $vidaDoInimigo - $forca;
};

function curar(array $personagem, int $qnt = 20): array
{
    $personagem["vida"] += $qnt;
    return $personagem;
}

function estaVivo(array $personagem): bool
{
    if ($personagem["vida"] > 0) {
        return true;
    } else {
        return false;
    }
}

?>