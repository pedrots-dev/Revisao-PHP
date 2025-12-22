<?php
require_once 'Atacante.php';
require_once 'personagem.php';

class BattleService
{
    public function atacarAlvo(Atacante $atacante, Personagem $alvo, int $danoBase):array {
        
        $danoAtacante = $atacante->atacar($danoBase);
        $danoAtacante = (int) floor($danoAtacante); //conversão de float para inteiro

        $vidaAntes = $alvo->getVida();
        
        $vidaAlvo = $vidaAntes - $danoAtacante;

        if ( $vidaAlvo <= 0){
            $vidaDepois = 0;
            $estaVivo = false;
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