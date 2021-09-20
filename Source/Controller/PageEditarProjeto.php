<?php

use \DAO\ProjectDAO;
use \Model\Project;

$projectDAO = new ProjectDAO($connection);
precode($_SERVER);
$project = $projectDAO->read($_GET['id']);

if (!$project) return $router->redirect("projeto-nao-encontrado");

if (count($_POST)) {
    $editedProject = new Project(id: $_POST['project-id'],
                                 name: $_POST['project-name'],
                                 description: $_POST['project-description'],
                                 situation: $_POST['project-situation'],
                                 notes: $_POST['project-notes']);
    $projectDAO->update($editedProject);
    header('Location: /projetos');
}

$title = "Editar Projeto";
require "ViewLoader.php";
