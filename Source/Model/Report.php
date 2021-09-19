<?php

namespace Model;

use \Model\Project;

class Report
{
    private Project $project;
    private ?array $tasks;
    private ?float $hourlyRate;

    public function __construct(Project $project, ?array $tasks, ?float $hourlyRate = null)
    {
        $this->project = $project;
        $this->tasks = $tasks;
        $this->hourlyRate = $hourlyRate;
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }
}
