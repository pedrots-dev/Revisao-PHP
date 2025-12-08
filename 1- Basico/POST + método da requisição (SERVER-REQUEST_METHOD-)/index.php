<form method="post" action="index.php">
    <input type="text" name="nome" placeholder="Digite seu nome" required>
    <select name="classe" required>
        <option selected disabled value="" required>Selecione sua classe</option>
        <option value="Arqueiro">Arqueiro</option>
        <option value="Maga">Maga</option>
        <option value="Guerreiro">Guerreiro</option>
        <option value="Ladina">Ladina</option>
    </select>
    <input type="number" name="vidaInicial" placeholder="Digite seu nome" required>
    <input type="submit" value="Enviar">
</form>

<?php
    //  Para rodar na web só dar esse comando no terinal:
    // php -S localhost:8000

    // Import
    require_once 'config.php';
    require_once 'funcoes.php';

    var_dump($_SERVER);

    // Code
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $personagemCriado = [
            "nome" => $_POST['nome'] ?? null,
            "classe" => $_POST['classe'] ?? null,
            "nivel" => 1,
            "vida" => $_POST['vidaInicial'] ?? null,
            "isVivo" => true,
            "inventario" => []
        ];

        if (in_array(null, $personagemCriado) === false) {
            echo "Preencha todos os campos.";
        };
    };
?>