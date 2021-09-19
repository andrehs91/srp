<?php

namespace Model;

class Project
{
    private ?int $id;
    private string $name;
    private string $description;
    private string $situation;
    private ?string $notes;
    
    public function __construct(int $id = null,
                                string $name,
                                string $description,
                                string $situation,
                                string $notes = null)
    {
        $this->id = $id;
        $this->name = strip_tags($name);
        $this->description = strip_tags($description);
        $this->situation = strip_tags($situation);
        $this->notes = strip_tags($notes);
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    
    public function getDescription(): string
    {
        return $this->description;
    }
    
    public function getSituation(): string
    {
        return $this->situation;
    }
    
    public function getNotes(): ?string
    {
        return $this->notes;
    }
}
