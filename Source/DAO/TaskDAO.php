<?php

namespace DAO;

use PDO;
use \Model\Task;

class TaskDAO
{
    private PDO $connection;
    
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    private function newTask(array $taskData): Task
    {
        return new Task(id: $taskData['id'],
                        projectId: $taskData['project_id'],
                        projectName: $taskData['project_name'],
                        situation: $taskData['situation'],
                        date: $taskData['date'],
                        startTime: $taskData['start_time'],
                        endTime: $taskData['end_time'],
                        description: $taskData['description'],
                        notes: $taskData['notes']);
    }

    private function newTasks(array $tasksData): array
    {
        $tasks = [];
        foreach ($tasksData as $taskData) {
            $tasks[] = $this->newTask($taskData);
        }
        return $tasks;
    }
    
    public function create(Task $task): bool
    {
        $query = "INSERT INTO tasks 
                    (date, start_time, end_time, situation, description, notes, project_id)
                VALUES
                    (:date, :start_time, :end_time, :situation, :description, :notes, :project_id);";
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':date', $task->getDate());
        $statement->bindValue(':start_time', $task->getStartTime());
        $statement->bindValue(':end_time', $task->getEndTime());
        $statement->bindValue(':situation', $task->getSituation());
        $statement->bindValue(':description', $task->getDescription());
        $statement->bindValue(':notes', $task->getNotes());
        $statement->bindValue(':project_id', $task->getProjectId());
        return $statement->execute();
    }
    
    public function read(int $id): ?Task
    {
        $query = 'SELECT * FROM (SELECT tasks.*, projects.name AS project_name FROM tasks INNER JOIN projects ON tasks.project_id = projects.id) WHERE id = :id;'; // Criar VIEW
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $task = $statement->fetch();
        if (!$task) return null;
        return $this->newTask($task);
    }
    
    public function readAll(): ?array
    {
        $query = 'SELECT tasks.*, projects.name AS project_name FROM tasks INNER JOIN projects ON tasks.project_id = projects.id;';
        $result = $this->connection->query($query);
        $tasks = $result->fetchAll();
        if (!count($tasks)) return null;
        return $this->newTasks($tasks);
    }
    
    public function update(Task $task): bool
    {
        $query = 'UPDATE tasks SET
                    date = :date,
                    start_time = :start_time,
                    end_time = :end_time,
                    situation = :situation,
                    description = :description,
                    notes = :notes,
                    project_id = :project_id
                WHERE id = :id;';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':date', $task->getDate());
        $statement->bindValue(':start_time', $task->getStartTime());
        $statement->bindValue(':end_time', $task->getEndTime());
        $statement->bindValue(':situation', $task->getSituation());
        $statement->bindValue(':description', $task->getDescription());
        $statement->bindValue(':notes', $task->getNotes());
        $statement->bindValue(':project_id', $task->getProjectId());
        $statement->bindValue(':id', $task->getId());
        return $statement->execute();
    }
    
    public function delete(int $id): bool
    {
        $query = 'DELETE FROM tasks WHERE id = :id;';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $id);
        return $statement->execute();
    }
    
    public function filter(array $parameters, array $validatedKeys): ?array
    {
        $addAnd = 0;
        $query = 'SELECT * FROM (SELECT tasks.*, projects.name AS project_name FROM tasks INNER JOIN projects ON tasks.project_id = projects.id) WHERE';
        foreach ($parameters as $parameterKey => $parameterValue) {
            if (in_array($parameterKey, $validatedKeys)) {
                if ($addAnd > 0 && $addAnd < count($validatedKeys)) {
                    $query .= " AND";
                }
                $query .= " $parameterKey LIKE :$parameterKey";
                $addAnd++;
            }
        }
        $query .= ';';
        $statement = $this->connection->prepare($query);
        foreach ($parameters as $parameterKey => $parameterValue) {
            if (in_array($parameterKey, $validatedKeys)) {
                $statement->bindValue(":$parameterKey", "%" . $parameterValue . "%");
            }
        }
        $statement->execute();
        $tasksData = $statement->fetchAll();
        if (!count($tasksData)) return null;
        return $this->newtasks($tasksData);
    }
}
