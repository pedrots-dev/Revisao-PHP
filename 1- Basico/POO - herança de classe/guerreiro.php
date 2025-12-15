<?php
require_once 'personagem.php';

class Guerreiro extends Personagem{
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
    public function ataquePesado(): int{
        return $this->forca * 2;
    }
    public function exibirStatus(): string
    {
        $statusGuerreiro = " - Força: {$this->getForca()}";
        $status = parent::exibirStatus() . $statusGuerreiro;

        return $status;
    }
}
?>