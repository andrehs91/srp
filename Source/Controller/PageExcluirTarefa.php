<?php

use \DAO\TaskDAO;
use \Model\Task;
use \DAO\ProjectDAO;

$taskDAO = new TaskDAO($connection);
$task = $taskDAO->read($_GET['id']);

if (!$task) return $router->redirect("tarefa-nao-encontrada");

if (count($_POST)) {
    $taskDAO->delete($_POST['task-id']);
    header('Location: /tarefas');
}

$projectDAO = new ProjectDAO($connection);
$project = $projectDAO->read($task->getProjectId());

$title = "Excluir Tarefa";
require "ViewLoader.php";
