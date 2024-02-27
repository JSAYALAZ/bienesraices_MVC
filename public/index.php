<?php

require_once __dir__.'/../includes/app.php';
use MVC\Router;

$router = new Router();

$router->get('/nosotros','funcion de nosotros');
$router->get('/crear','funcion de crear');
$router->get('/act','funcion de act');
$router->comprobarRutas();
