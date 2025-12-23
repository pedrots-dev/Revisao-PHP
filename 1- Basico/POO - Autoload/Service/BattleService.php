<?php
require_once './model/Atacante.php';
require_once './model/Personagem.php';
require_once './log/EchoLogger.php';


class BattleService
{
    private CombatLogger $logger;

    public function __construct(CombatLogger $logger)
    {
        $this->logger = $logger;
    }


    public function atacarAlvo(Atacante $atacante, Personagem $alvo, int $danoBase):array {
        
        $this->logger->log("Batalha iniciada");
        
        $danoAtacante = $atacante->atacar($danoBase);
        $danoAtacante = (int) floor($danoAtacante); //conversão de float para inteiro

        $this->logger->log("Dano: $danoAtacante");

        $vidaAntes = $alvo->getVida();
        
        $vidaAlvo = $vidaAntes - $danoAtacante;

        if ( $vidaAlvo <= 0){
            $vidaDepois = 0;
            $estaVivo = false;
            $this->logger->log("Alvo morreu");
        } else {
            $vidaDepois = $vidaAlvo;
            $estaVivo = true;
        }


        return [
            'danoFinal' => $danoAtacante,
            'vidaAntes' => $vidaAntes,
            'vidaDepois' => $vidaDepois,
            'estaVivo' => $estaVivo,
        ];
    }
};
?>