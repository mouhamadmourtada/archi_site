<?php

    
    require_once '../autoload.php';

    session_start();

    use site\Routes\NoRouteException;
    use site\Routes\Routes;



    try {
        $routes = new Routes();

        $routes->dispatch();


    } catch (NoRouteException $th) {
        echo $th->getMessage();
    }
