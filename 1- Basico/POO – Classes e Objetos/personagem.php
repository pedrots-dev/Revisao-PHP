<?php
class personagem{
    public string $nome;
    public string $classe;
    public int $nivel;
    public int $vida;
    public bool $isVivo;
    public array $inventario;



    public function __construct(string $nome, string $classe, int $nivel, int $vida, bool $isVivo, array $inventario){
        $this->nome = $nome;
        $this->classe = $classe;
        $this->nivel = $nivel;
        $this->vida = $vida;
        $this->isVivo = $isVivo;
        $this->inventario = $inventario;
    }

    public function exibirStatus(): string
    {
        $status = "O personagem $this->nome " . "- ($this->classe)" . " - " . "Nível $this->nivel " . "-" . " Vida: $this->vida";
        return $status;
    }

    public function tomarDano(int $forca): void{
        $this->vida -= $forca;
    }
    
    public function curar(int $qnt = 20): void{
        $this->vida += $qnt;
    }

    public function estaVivo(): bool{
        return $this->vida > 0;
    }
};



?>