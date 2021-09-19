<?php

use \DAO\ProjectDAO;
use \DAO\TaskDAO;
use \Model\Report;

$projectDAO = new ProjectDAO($connection);

if (isset($_GET['project-id'])) {
    $taskDAO = new TaskDAO($connection);
    $report = new Report($projectDAO->read($_GET['project-id']), $taskDAO->filter(["project" => $_GET['project-id']]));
}

$projectsObjects = $projectDAO->readAll();
$projects = [];
foreach ($projectsObjects as $projectObject) {
    $projects[$projectObject->getId()] = $projectObject->getName();
}

$title = "Relatórios";
require "ViewLoader.php";
