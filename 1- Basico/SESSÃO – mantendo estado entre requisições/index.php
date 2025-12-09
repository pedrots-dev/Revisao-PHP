<?php
//  Para rodar na web só dar esse comando no terinal:
// php -S localhost:8000

// Import
require_once 'config.php';
require_once 'funcoes.php';



// Code
session_start();
$personagemExiste = isset($_SESSION["personagem"]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //Processamento de post
    $apagarAcao = isset($_POST['acao']);
    if ($apagarAcao) { //se for pra apagar
        unset($_SESSION['personagem']);
        echo "Personagem apagado com sucesso.";
        $personagemExiste = false;
    }else{ //se for pra criar
    $personagemCriado = [
        "nome" => $_POST['nome'] ?? null,
        "classe" => $_POST['classe'] ?? null,
        "nivel" => 1,
        "vida" => $_POST['vidaInicial'] ?? null,
        "isVivo" => true,
        "inventario" => []
    ];

    if (in_array(null, $personagemCriado, true)) { //validação simples
        echo "Preencha todos os campos.";
    } else { // Se passar pela validação cria o personagem e salva na sessão
        $_SESSION['personagem'] = $personagemCriado;
        $personagemExiste = true;
    }
};


};
 if ($personagemExiste == false) { //se o personagem não exitir na sessão, exibe o formulário
    echo '<form method="post" action="index.php">
    <input type="text" name="nome" placeholder="Digite seu nome" required>
    <select name="classe" required>
        <option selected disabled value="" required>Selecione sua classe</option>
        <option value="Arqueiro">Arqueiro</option>
        <option value="Maga">Maga</option>
        <option value="Guerreiro">Guerreiro</option>
        <option value="Ladina">Ladina</option>
    </select>
    <input type="number" name="vidaInicial" placeholder="Digite sua vida inicial" required>
    <input type="submit" value="Enviar">
</form>';
};

if ($personagemExiste) { //se o personagem existir na sessão, exibe o status e o botão para apagar
    echo exibirStatus($_SESSION["personagem"]);
    echo '<form method="post" action="index.php">
    <button type="submit" name="acao" value="apagar">Apagar personagem</button>
    </form>';
}
?>