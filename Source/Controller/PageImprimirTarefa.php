<?php

use \DAO\TaskDAO;
use \DAO\ProjectDAO;

$taskDAO = new TaskDAO($connection);
$task = $taskDAO->read($_GET['id']);

if (!$task) return $router->redirect("tarefa-nao-encontrada");

if (isset($_GET['hourly_rate']) && $_GET['hourly_rate'] !== "") {
    $hourlyRate = str_replace(',', '.', $_GET['hourly_rate']);
}
$hourlyRate = is_numeric($hourlyRate) ? $hourlyRate : 0;

$projectDAO = new ProjectDAO($connection);
$project = $projectDAO->read($task->getProjectId());

$title = "Imprimir Tarefa";
require "ViewLoader.php";
