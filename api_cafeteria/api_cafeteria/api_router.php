<?php
require_once './libs/router/router.php';

require_once './app/controllers/ReseniaControllerApi.php';


// instancio el router
$router = new Router();

// defino los endpoints
$router->addRoute('resenias',     'GET',     'ReseniaControllerApi',    'getResenias');
$router->addRoute('resenias',     'POST',     'ReseniaControllerApi',    'insertResenia');
// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
