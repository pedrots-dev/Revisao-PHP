<?php
require_once 'CombatLogger.php';
require_once 'StatusLogger.php';

class EchoLogger implements CombatLogger, StatusLogger {
    public function log(string $mensagem):void {
        echo "[Log]: " . $mensagem . "<br>";
    }
}

?>