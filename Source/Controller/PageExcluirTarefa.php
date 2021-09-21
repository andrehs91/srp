<?php

use \DAO\TaskDAO;
use \DAO\ProjectDAO;

$taskDAO = new TaskDAO($connection);
$task = null;
if (isset($_GET['id']) && is_numeric($_GET['id'])) $task = $taskDAO->read($_GET['id']);
if (!$task) return $router->redirect("tarefa-nao-encontrada");

if (count($_POST)) {
    $taskDAO->delete($_POST['task-id']);
    header('Location: /tarefas');
}

$title = "Excluir Tarefa";
require "ViewLoader.php";
