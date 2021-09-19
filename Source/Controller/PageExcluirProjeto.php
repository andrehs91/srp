<?php

use \DAO\ProjectDAO;

$projectDAO = new ProjectDAO($connection);
$project = $projectDAO->read($_GET['id']);

if (!$project) return $router->redirect("projeto-nao-encontrado");

if (count($_POST)) {
    $projectDAO->delete($_POST['project-id']);
    header('Location: /projetos');
}

$title = "Excluir Projeto";
require "ViewLoader.php";
