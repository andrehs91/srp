<?php

use \DAO\ProjectDAO;
use \Model\Project;

$projectDAO = new ProjectDAO($connection);
if (count($_POST)) {
    $newProject = new Project(name: $_POST['project-name'],
                              description: $_POST['project-description'],
                              situation: $_POST['project-situation'],
                              notes: $_POST['project-notes']);
    $projectDAO->create($newProject);
    header('Location: /projetos');
} elseif (count($_GET)) {
    $validatedKeys = validateKeys($_GET, ["name", "description", "situation", "notes"]);
    if ($validatedKeys) $projects = $projectDAO->filter($_GET, $validatedKeys);
    else $projects = $projectDAO->readAll();
} else {
    $projects = $projectDAO->readAll();
}

$title = "Projetos";
require "ViewLoader.php";
