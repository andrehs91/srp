<?php

// ini_set('display_errors', 1);         // Comentar em produção
// ini_set('display_startup_errors', 1); // Comentar em produção
// error_reporting(E_ALL);               // Comentar em produção

require_once "../autoload.php";

use \Controller\Router;
use \Controller\MySQLConnection;

$router = new Router($_SERVER['REQUEST_URI']);
$route = $router->getRoute();
$connection = MySQLConnection::createConnection();

try {
    require "../Source/Controller/$route.php";
} catch (Throwable $throwable) {
    // showThrowable($throwable); // Comentar em produção
    $router->redirect("404");
}
