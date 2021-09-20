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
if ($projectsObjects) {
    $projects = [];
    foreach ($projectsObjects as $projectObjects) {
        $projects[$projectObjects->getId()] = $projectObjects->getName();
    }
} else {
    $projects = null;
}

$title = "Relatórios";
require "ViewLoader.php";
