<?php

class Container
{
    private array $bindings = []; //guarda configurações(tipo um Banco de Dados)
    // Assim que as coisas ficam salvas no bindings depois de executar a função bind()
    // $bindings = [
    // 'BattleService' => function() { ... },
    // 'CombatLogger'  => function() { ... }
    // ];

    public function bind(string $nome, callable $factory): void //Função chamada para criar configurações
    {
        $this->bindings[$nome] = $factory;
    }

    public function make(string $nome) //Função chamada para criar classes pre-configuradas usando bind
    {
        if (!isset($this->bindings[$nome])) {
            throw new Exception("Nada registrado no container para {$nome}");
        }

        return $this->bindings[$nome]($this);
    }
}
