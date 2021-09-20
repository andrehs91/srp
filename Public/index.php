<?php

require_once "../autoload.php";

use \Controller\SQLiteConnection;
use \Controller\Router;

$connection = SQLiteConnection::createConnection();
$router = new Router($_SERVER['REQUEST_URI']);
$route = $router->getRoute();

try {
    require "../Source/Controller/$route.php";
} catch (Throwable $throwable) {
    // showThrowable($throwable);
    $router->redirect("404");
}
