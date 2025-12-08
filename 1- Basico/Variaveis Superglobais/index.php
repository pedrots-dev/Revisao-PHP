<?php
//  Para rodar na web só dar esse comando no terinal:
// php -S localhost:8000

// Import
require_once 'config.php';
require_once 'funcoes.php';

// Code
$personagemAtual = $_GET['personagem'] ?? 'Indice invalido para personagem';
$inimigoAtual = $_GET['inimigo'] ?? 'Indice invalido para inimigo';

$indicesValidosPersonagem = count($personagens) - 1;
$indicesValidosInimigo = count($inimigos) - 1;

// echo "Indices validos para personagem: 0 a {$indicesValidosPersonagem}<br>";
// echo "Indices validos para inimigo: 0 a {$indicesValidosInimigo }<br>";

// Validação dos índices
if ($personagemAtual === 'Indice invalido para personagem' || $inimigoAtual === 'Indice invalido para inimigo' || $personagemAtual && $inimigoAtual < 0 || $personagemAtual > $indicesValidosPersonagem || $inimigoAtual < 0 || $inimigoAtual > $indicesValidosInimigo) {
    echo('Por favor, forneça índices válidos para personagem e inimigo na URL. Exemplo: ?personagem=0&inimigo=1');
} else{
$personagemAtual = $personagens[$personagemAtual];
$inimigoAtual = $inimigos[$inimigoAtual];

echo "Status do Personagem:<br>";
echo exibirStatus($personagemAtual) . "<br>";

echo "O personagem sofreu um ataque do inimigo {$inimigoAtual['nome']}!<br>";

$newVida = atacar($personagemAtual['vida'], $inimigoAtual['forca']);
$personagemAtual['vida'] = $newVida;

if (estaVivo($personagemAtual)) {
    echo "O personagem sobreviveu ao ataque!<br>";
    $personagemAtual= curar($personagemAtual);
    echo "Novo satus do personagem" . exibirStatus($personagemAtual);
} else {
    echo "O personagem morreu no ataque!<br>";
    echo exibirStatus($personagemAtual);
}
};

?>