<?php
require_once "./core/Container.php";

$container = new Container();

$container->bind(CombatLogger::class, function(){
    return new EchoLogger();
});

$container->bind(BattleService::class, function ($c) {
    return new BattleService(
        $c->make(CombatLogger::class)
    );
});

$container->bind(StatusLogger::class, function(){
    return new EchoLogger();
});

$container->bind(StatusService::class, function($c){
    return new StatusService($c->make(StatusLogger::class)
    );
});

return $container;

?>