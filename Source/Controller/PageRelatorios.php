<?php

use \DAO\ProjectDAO;
use \DAO\TaskDAO;
use \Model\Report;

$projectDAO = new ProjectDAO($connection);

if (isset($_GET['project_id'])) {
    $taskDAO = new TaskDAO($connection);
    $hourlyRate =  0;
    if (isset($_GET['hourly_rate']) && $_GET['hourly_rate'] !== "") {
        $hourlyRate = str_replace(',', '.', $_GET['hourly_rate']);
        $hourlyRate = is_numeric($hourlyRate) ? $hourlyRate : 0;
    }
    $report = new Report($projectDAO->read($_GET['project_id']),
                         $taskDAO->filter($_GET, ['project_id']),
                         $hourlyRate);
}

$projects = $projectDAO->readAll();

$title = "Relatórios";
require "ViewLoader.php";
