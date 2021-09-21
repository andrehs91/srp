<?php

use \DAO\TaskDAO;

$taskDAO = new TaskDAO($connection);
$task = null;
if (isset($_GET['id']) && is_numeric($_GET['id'])) $task = $taskDAO->read($_GET['id']);
if (!$task) return $router->redirect("tarefa-nao-encontrada");

if (isset($_GET['hourly_rate']) && $_GET['hourly_rate'] !== "") {
    $hourlyRate = str_replace(',', '.', $_GET['hourly_rate']);
}
$hourlyRate = is_numeric($hourlyRate) ? $hourlyRate : 0;

$title = "Imprimir Tarefa";
require "ViewLoader.php";
