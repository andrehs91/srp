<?php

use \DAO\TaskDAO;
use \Model\Task;
use \DAO\ProjectDAO;

$taskDAO = new TaskDAO($connection);
$task = null;
if (isset($_GET['id']) && is_numeric($_GET['id'])) $task = $taskDAO->read($_GET['id']);
if (!$task) return $router->redirect("tarefa-nao-encontrada");

if (count($_POST)) {
    $editedTask = new Task(id: $_POST['task-id'],
                           projectId: $_POST['project-id'],
                           situation: $_POST['task-situation'],
                           date: $_POST['task-date'],
                           startTime: $_POST['task-start-time'],
                           endTime: $_POST['task-end-time'],
                           description: $_POST['task-description'],
                           notes: $_POST['task-notes']);
    $taskDAO->update($editedTask);
    header('Location: /tarefas');
}

$projectDAO = new ProjectDAO($connection);
$projectObjects = $projectDAO->readAll();
$projects = [];
foreach ($projectObjects as $project) {
    $projects[$project->getId()] = $project->getName();
}

$title = "Editar Tarefa";
require "ViewLoader.php";
