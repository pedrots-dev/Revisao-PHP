<?php
require_once './model/personagem.php';
require_once './model/Atacante.php';

class Mago extends Personagem implements Atacante
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
    public function atacar(int $danoBase): float
    {
        $mana = $this->getMana();
        if ($mana < 10) {
            return 0;
        }
        else{
            $this->gastarMana(10);
            $danoFinal = $danoBase * 1.5;
            return $danoFinal;
        }
    }
}

?>