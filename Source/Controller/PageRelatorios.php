<?php

use \DAO\ProjectDAO;
use \DAO\TaskDAO;
use \Model\Report;

$projectDAO = new ProjectDAO($connection);

if (isset($_GET['project_id'])) {
    $taskDAO = new TaskDAO($connection);
    if (isset($_GET['hourly_rate']) && $_GET['hourly_rate'] !== "") {
        $hourlyRate = str_replace(',', '.', $_GET['hourly_rate']);
        $hourlyRate = is_numeric($hourlyRate) ? $hourlyRate : 0;
    } else {
        $hourlyRate =  0;
    }
    $report = new Report($projectDAO->read($_GET['project_id']),
                         $taskDAO->filter($_GET, ['project_id']),
                         $hourlyRate);
}

$projectsObjects = $projectDAO->readAll();
$projects = [];
foreach ($projectsObjects as $projectObject) {
    $projects[$projectObject->getId()] = $projectObject->getName();
}

$title = "Relatórios";
require "ViewLoader.php";
