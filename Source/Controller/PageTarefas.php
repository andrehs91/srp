<?php

use \DAO\TaskDAO;
use \Model\Task;
use \DAO\ProjectDAO;

$taskDAO = new TaskDAO($connection);
if (count($_POST)) {
    $newTask = new Task(date: $_POST['task-date'],
                        startTime: $_POST['task-start-time'],
                        endTime: $_POST['task-end-time'],
                        situation: $_POST['task-situation'],
                        description: $_POST['task-description'],
                        notes: $_POST['task-notes'],
                        projectId: $_POST['project-id']);
    $taskDAO->create($newTask);
    header('Location: /tarefas');
} elseif (count($_GET)) {
    $tasks = $taskDAO->filter($_GET);
} else {
    $tasks = $taskDAO->readAll();
}

$projectDAO = new ProjectDAO($connection);
$projectsObjects = $projectDAO->readAll();
$projects = [];
foreach ($projectsObjects as $projectObjects) {
    $projects[$projectObjects->getId()] = $projectObjects->getName();
}

$title = "Tarefas";
require "ViewLoader.php";
