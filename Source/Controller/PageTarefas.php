<?php

use \DAO\ProjectDAO;
use \DAO\TaskDAO;
use \Model\Task;

$projectDAO = new ProjectDAO($connection);
$projectList = $projectDAO->projectList();
// precode($projectList); TESTAR SEM PROJETOS

$taskDAO = new TaskDAO($connection);
if (count($_POST)) {
    $newTask = new Task(projectId: $_POST['project-id'],
                        projectName: $projectList[$_POST['project-id']],
                        situation: $_POST['task-situation'],
                        date: $_POST['task-date'],
                        startTime: $_POST['task-start-time'],
                        endTime: $_POST['task-end-time'],
                        description: $_POST['task-description'],
                        notes: $_POST['task-notes']);
    $taskDAO->create($newTask);
    header('Location: /tarefas');
} elseif (count($_GET)) {
    $validatedKeys = validateKeys($_GET, ["project_id", "situation", "description", "notes"]);
    if ($validatedKeys) $tasks = $taskDAO->filter($_GET, $validatedKeys);
    else $tasks = $taskDAO->readAll();
} else {
    $tasks = $taskDAO->readAll();
}

$title = "Tarefas";
require "ViewLoader.php";
