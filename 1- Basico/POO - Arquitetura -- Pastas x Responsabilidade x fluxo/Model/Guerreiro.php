<?php
require_once './model/Personagem.php';
require_once './model/Atacante.php';

class Guerreiro extends Personagem implements Atacante{
    private int $forca;

    public function __construct(string $nome, int $nivel = 1, int $vida = 100, array $inventario = [], int $forca = 50)
    {
        parent::__construct($nome, "Guerreiro", $nivel, $vida, $inventario);

        $this->forca = $forca;
    }

    public function getForca(): int
    {
        return $this->forca;
    }
    public function exibirStatus(): string
    {
        $statusGuerreiro = " - Força: {$this->getForca()}";
        $status = parent::exibirStatus() . $statusGuerreiro;
        
        return $status;
    }

    // Implementação do método da interface Atacante
    public function atacar(int $danoBase): float{
        return $this->forca * 1.5 + $danoBase;
    }
}
?>