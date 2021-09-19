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
        $query = 'SELECT * FROM tasks WHERE id = :id;';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $task = $statement->fetch();
        if (!$task) return null;
        return $this->newTask($task);
    }
    
    public function readAll(): ?array
    {
        $result = $this->connection->query('SELECT * FROM tasks;');
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
    
    public function filter(array $parameters): ?array
    {
        if (!$parameters['project'] &&
            !$parameters['description'] &&
            !$parameters['situation'] &&
            !$parameters['notes']) {
            return $this->readAll();
        }
        $addAnd = false;
        $query = 'SELECT * FROM tasks WHERE';
        if ($parameters['project']) {
            $query .= ' project_id LIKE :project_id';
            $addAnd = true;
        }
        if ($parameters['situation']) {
            if ($addAnd) $query .= " AND";
            $query .= ' situation LIKE :situation';
            $addAnd = true;
        }
        if ($parameters['description']) {
            if ($addAnd) $query .= " AND";
            $query .= ' description LIKE :description';
            $addAnd = true;
        }
        if ($parameters['notes']) {
            if ($addAnd) $query .= " AND";
            $query .= ' notes LIKE :notes';
        }
        $query .= ';';
        $statement = $this->connection->prepare($query);
        if ($parameters['project']) $statement->bindValue(':project_id', $parameters['project']);
        if ($parameters['situation']) $statement->bindValue(':situation', $parameters['situation']);
        if ($parameters['description']) $statement->bindValue(':description', "%" . $parameters['description'] . "%");
        if ($parameters['notes']) $statement->bindValue(':notes', "%" . $parameters['notes'] . "%");
        $statement->execute();
        $tasksData = $statement->fetchAll();
        if (!count($tasksData)) return null;
        return $this->newtasks($tasksData);
    }
}
