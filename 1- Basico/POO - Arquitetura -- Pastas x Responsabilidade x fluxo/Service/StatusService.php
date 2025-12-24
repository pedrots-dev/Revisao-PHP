<?php
require_once './autoload.php';

class StatusService {

    private StatusLogger $logger;

    public function __construct(StatusLogger $logger)
    {
        $this->logger = $logger;
    }

    public function getStatus(Personagem $personagem):string {
        try{
        if ($personagem->estaVivo() == false){
            throw new Exception("O personagem {$personagem->nome}, de classe {$personagem->classe}, não está vivo para que possa ser exibido o status");
        };

        $classe = $personagem->classe;
        $this->logger->log("Pedido de status recebido");
        switch($classe){
            case "Arqueiro":
                $this->logger->log("Classe encontrada com sucesso!");
                return $classe . ": " . "Especialista em combate à distância, o Arqueiro utiliza sua alta destreza para atacar com precisão letal sem se expor aos perigos da linha de frente. Sua prioridade é eliminar ameaças de longe, compensando a defesa moderada com alcance superior e posicionamento estratégico.";
            case "Guerreiro":
                $this->logger->log("Classe encontrada com sucesso!");
                return $classe . ": " . "Combatente da linha de frente, o Guerreiro se destaca pela alta resistência física e capacidade de absorver dano. Ele utiliza armaduras pesadas e força bruta para proteger seus aliados, chamando a atenção dos inimigos para si e dominando o combate corpo a corpo.";
            case "Ladina":
                $this->logger->log("Classe encontrada com sucesso!");
                return $classe . ": " . "Mestra da furtividade e agilidade, a Ladina evita confrontos diretos para surpreender os oponentes com ataques críticos e esquivas rápidas. Ela utiliza sua astúcia para explorar as fraquezas dos adversários, causando grande dano em alvos únicos antes de recuar para as sombras.";
            case "Mago":
                $this->logger->log("Classe encontrada com sucesso!");
                return $classe . ": " . "Detentor de poderes arcanos, o Mago compensa sua fragilidade física com feitiços elementais devastadores que podem atingir áreas inteiras. Ele usa sua inteligência e gerenciamento de mana para controlar o campo de batalha e dizimar grupos de inimigos à distância.";
            default:
                $this->logger->log("Classe não encontrada para exibir status");
                return "Personagem com classe que não existe ainda...";

        }
    } catch (Exception $e){
        $this->logger->log($e->getMessage());
        return "Erro: " . $e->getMessage();
    }
    }
}

?>