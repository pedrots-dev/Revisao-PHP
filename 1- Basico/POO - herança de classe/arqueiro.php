<?php
require_once 'personagem.php';

class Arqueiro extends Personagem{
    private int $precisao;

    public function __construct(string $nome, int $nivel = 1, int $vida = 100, array $inventario = [], int $precisao = 70)
    {
        parent::__construct($nome, "Arqueiro", $nivel, $vida, $inventario);


        $this->setPrecisao($precisao);
    }
    private function setPrecisao(int $precisao){
        if ($precisao > 100){
            $precisao = 100;
        } elseif ($precisao < 0){
            $precisao = 0;
        };

        $this->precisao = $precisao;
    }
    public function getPrecisao(): int{
        return $this->precisao;
    }
    public function dispararFlecha(int $danoBase): float{
        $danoTotal = $danoBase * $this->getPrecisao() / 100;
        return $danoTotal;
    }
    public function exibirStatus(): string
    {
        $precisaoSting = " Precisão: " . $this->getPrecisao() . "%<br>";
        return parent::exibirStatus() . $precisaoSting;
    }

}

?>