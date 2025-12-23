<?php
require_once './model/Personagem.php';
require_once './model/Atacante.php';

class Arqueiro extends Personagem implements Atacante{
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
    public function exibirStatus(): string
    {
        $precisaoSting = " Precisão: " . $this->getPrecisao() . "%<br>";
        return parent::exibirStatus() . $precisaoSting;
    }

    // Implementação do método da interface Atacante
    public function atacar(int $danoBase): float{
        $danoTotal = $danoBase * $this->getPrecisao() / 100;
        return $danoTotal;
    }

}

?>