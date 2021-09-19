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
    echo "<pre><code>";                                                   // Remover em produção
    echo "getFile: " . $throwable->getFile() . PHP_EOL;                   // Remover em produção
    echo "getLine: " . $throwable->getLine() . PHP_EOL;                   // Remover em produção
    echo "getMessage: " . $throwable->getMessage() . PHP_EOL;             // Remover em produção
    echo "getTraceAsString: " . $throwable->getTraceAsString() . PHP_EOL; // Remover em produção
    echo "</code></pre>";                                                 // Remover em produção
    $router->redirect("404");
}
