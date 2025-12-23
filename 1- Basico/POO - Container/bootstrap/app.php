<?php
require_once "./autoload.php";

$container = new Container();

$container->bind(CombatLogger::class, function(){
    return new EchoLogger();
});

$container->bind(BattleService::class, function ($c) {
    return new BattleService(
        $c->make(CombatLogger::class)
    );
});

return $container;

?>