<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../autoload.php";

use \Controller\Router;
use \Controller\SQLiteConnection;

$router = new Router($_SERVER['REQUEST_URI']);
$route = $router->getRoute();
$connection = SQLiteConnection::createConnection();

try {
    require "../Source/Controller/$route.php";
} catch (Throwable $throwable) {
    showThrowable($throwable);
    $router->redirect("404");
}
