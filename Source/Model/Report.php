<?php

namespace Model;

use \Model\Project;

class Report
{
    private Project $project;
    private ?array $tasks;

    public function __construct(Project $project, ?array $tasks)
    {
        $this->project = $project;
        $this->tasks = $tasks;
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }
}
