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
// Aqui é a validação de personagem usando a categoria de erro que criamos extendendo o Exception
function validarPersonagem(array $personagem): void {
    if (strlen($personagem['nome']) < 3) {
        throw new PersonagemException("O nome do personagem deve ter pelo menos 3 caracteres.");
    };
    if ($personagem["classe"] == null) {
        throw new PersonagemException("A classe do personagem é obrigatória.");
    };
    if ($personagem["nivel"] < 1) {
        throw new PersonagemException("O nível do personagem deve ser pelo menos 1.");
    };
    if ($personagem["vida"] < 1 || !is_int($personagem["vida"]) || is_float($personagem["vida"]) || $personagem["vida"] === null) {
        throw new PersonagemException("A vida do personagem deve ser pelo menos 1.");
    };
    if ($personagem["vida"] > 100) {
        throw new PersonagemException("A vida do personagem não pode exceder 100.");
    };
    if ($personagem["isVivo"] !== true && $personagem["isVivo"] !== false) {
        throw new PersonagemException("O status isVivo deve ser verdadeiro ou falso.");
    };
    if (!is_array($personagem["inventario"])) {
        throw new PersonagemException("O inventário deve ser um array.");
    };

}

?>