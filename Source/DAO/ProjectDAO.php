<?php

namespace DAO;

use PDO;
use \Model\Project;

class ProjectDAO
{
    private PDO $connection;
    
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    private function newProject(array $projectData): Project
    {
        return new Project(id: $projectData['id'],
                           name: $projectData['name'],
                           description: $projectData['description'],
                           situation: $projectData['situation'],
                           notes: $projectData['notes']);
    }

    private function newProjects(array $projectsData): array
    {
        $projects = [];
        foreach ($projectsData as $projectData) {
            $projects[] = $this->newProject($projectData);
        }
        return $projects;
    }
    
    public function create(Project $project): bool
    {
        $query = '  INSERT INTO projects 
                        (name, description, situation, notes)
                    VALUES
                        (:name, :description, :situation, :notes);';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':name', $project->getName());
        $statement->bindValue(':description', $project->getDescription());
        $statement->bindValue(':situation', $project->getSituation());
        $statement->bindValue(':notes', $project->getNotes());
        return $statement->execute();
    }
    
    public function read(int $id): ?Project
    {
        $query = 'SELECT * FROM projects WHERE id = :id;';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $projectData = $statement->fetch();
        if (!$projectData) return null;
        return $this->newProject($projectData);
    }
    
    public function readAll(): ?array
    {
        $result = $this->connection->query('SELECT * FROM projects;');
        $projectsData = $result->fetchAll();
        if (!count($projectsData)) return null;
        return $this->newProjects($projectsData);
    }
    
    public function update(Project $project): bool
    {
        $query = '  UPDATE projects
                    SET name = :name,
                        description = :description,
                        situation = :situation,
                        notes = :notes
                    WHERE id = :id;';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':name', $project->getName());
        $statement->bindValue(':description', $project->getDescription());
        $statement->bindValue(':situation', $project->getSituation());
        $statement->bindValue(':notes', $project->getNotes());
        $statement->bindValue(':id', $project->getId());
        return $statement->execute();
    }
    
    public function delete(int $id): bool
    {
        $query = 'DELETE FROM projects WHERE id = :id;';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $id);
        return $statement->execute();
    }

    public function projectList(): ?array{
        $projects = $this->readAll();
        $projectList = null;
        if ($projects) {
            foreach ($projects as $project) {
                $projectList[$project->getId()] = $project->getName();
            }
        }
        return $projectList;
    }
    
    public function filter(array $parameters, array $validatedKeys): ?array
    {
        $addAnd = 0;
        $query = 'SELECT * FROM projects WHERE';
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
        $projectsData = $statement->fetchAll();
        if (!count($projectsData)) return null;
        return $this->newProjects($projectsData);
    }
}
