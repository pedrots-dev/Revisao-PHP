<?php
require_once 'CombatLogger.php';

class EchoLogger implements CombatLogger{
    public function log(string $mensagem):void {
        echo "[Batalha]: " . $mensagem . "<br>";
    }
}

?>