<?php

abstract class Personagem
{
    public string $nome;
    public string $classe;
    public int $nivel;
    private int $vida;
    private array $inventario;

    public function __construct(
        string $nome, //obrigatorio
        string $classe, //obrigatorio
        int $nivel = 1,
        int $vida = 100,
        array $inventario = []
    ) {
        $this->nome = $nome;
        $this->classe = $classe;
        $this->nivel = $nivel;
        $this->inventario = $inventario;

        $this->setVida($vida);
    }

    private function setVida(int $vida): void
    {
        if ($vida < 0) {
            $vida = 0;
        }

        if ($vida > 100) {
            $vida = 100;
        }

        $this->vida = $vida;
    }

    public function getVida(): int
    {
        return $this->vida;
    }

    public function exibirStatus(): string
    {
        return "O personagem {$this->nome} ({$this->classe}) - Nível {$this->nivel} - Vida: {$this->getVida()}";
    }

    public function tomarDano(int $forca): void
    {
        $this->setVida($this->vida - $forca);
    }

    public function curar(int $qnt = 20): void
    {
        $this->setVida($this->vida + $qnt);
    }

    public function estaVivo(): bool
    {
        return $this->vida > 0;
    }
}
