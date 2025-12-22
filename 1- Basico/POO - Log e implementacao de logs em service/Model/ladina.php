<?php
require_once './model/personagem.php';
require_once './model/Atacante.php';

class Ladina extends Personagem implements Atacante{
    private float $chanceCritico;

    public function __construct(string $nome, int $nivel = 1, int $vida = 100, array $inventario = [], float $chanceCritico = 0.3)
    {
        parent::__construct($nome, "Ladina", $nivel, $vida, $inventario);

        $this->setCritico($chanceCritico); //faz com que o critico tenha um valor entre 0 e 1

    }

    private function setCritico(float $chanceCritico): void
    {
        if ($chanceCritico < 0) {
            $chanceCritico = 0;
        }

        if ($chanceCritico > 1) {
            $chanceCritico = 1;
        }

        $this->chanceCritico = $chanceCritico;
    }
    
    public function getChanceCritico(): float
    {
        return $this->chanceCritico;
    }

    public function atacar(int $danoBase): float{
        $dano = $danoBase * (1 + $this->getChanceCritico());
        return $dano;
    }
    public function exibirStatus(): string
    {
        $statusLadina = " - Chance de Crítico: " . ($this->getChanceCritico() * 100) . "%";
        $status = parent::exibirStatus() . $statusLadina;

        return $status;
    }
}



?>