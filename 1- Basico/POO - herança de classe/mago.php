<?php
require_once 'personagem.php';

class Mago extends Personagem
{
    private int $mana;

    public function __construct(string $nome, int $nivel = 1, int $vida = 100, array $inventario = [], int $mana = 100)
    {
        parent::__construct($nome, "Mago", $nivel, $vida, $inventario);

        $this->mana = $mana;
    }
    public function getMana(): int
    {
        return $this->mana;
    }
    public function gastarMana(int $qnt): void
    {
        $this->mana -= $qnt;
        if ($this->mana < 0) {
            $this->mana = 0;
        }
    }
    public function exibirStatus(): string
    {
        $statusMago = " - Mana: {$this->getMana()}";
        $status = parent::exibirStatus() . $statusMago;

        return $status;
    }
}

?>