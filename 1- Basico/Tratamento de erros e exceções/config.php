<?php
// dados do personagem, inimigos etc
$personagens = [
    [
        "nome" => "Pedro",
        "classe" => "Arqueiro",
        "nivel" => 12,
        "vida" => 100,
        "isVivo" => true,
        "inventario" => ["espada", "poção", "escudo", "arco", "flecha"]
    ],
    // Personagem 2: Focado em magia
    [
        "nome" => "Sofia",
        "classe" => "Maga",
        "nivel" => 15,
        "vida" => 80,
        "isVivo" => true,
        "inventario" => ["cajado", "poção de mana", "livro de feitiços", "túnica"]
    ],
    // Personagem 3: Focado em força/tanque
    [
        "nome" => "Grom",
        "classe" => "Guerreiro",
        "nivel" => 18,
        "vida" => 100,
        "isVivo" => true,
        "inventario" => ["machado duplo", "armadura pesada", "elmo", "carne seca"]
    ],
    // Personagem 4: Focado em furtividade
    [
        "nome" => "Lira",
        "classe" => "Ladina",
        "nivel" => 10,
        "vida" => 90,
        "isVivo" => true,
        "inventario" => ["adagas", "kit de ladino", "capa escura", "bomba de fumaça"]
    ]
];

$inimigos = [
    ["nome" => "Goblin", "forca" => 15, "vida" => 50],
    ["nome" => "Orc", "forca" => 25, "vida" => 80],
    ["nome" => "Troll", "forca" => 40, "vida" => 100]
];

// Classes de erro
// Aqui estamos deixando o exception maior adicionando categorias dentro da função exception
class PersonagemException extends Exception {}
?>