<?php

namespace Model;

use \DateTimeInterface;
use \DateTime;

class Task
{
    private ?int $id;
    private int $projectId;
    private string $situation;
    private DateTimeInterface $start;
    private DateTimeInterface $end;
    private string $description;
    private ?string $notes;
    
    public function __construct(int $id = null,
                                int $projectId,
                                string $situation,
                                string $date,      // "Y-m-d"
                                string $startTime, // "H:i"
                                string $endTime,   // "H:i"
                                string $description,
                                string $notes = null)
    {
        $this->id = $id;
        $this->projectId = $projectId;
        $this->situation = strip_tags($situation);
        $this->setStart($date, $startTime);
        $this->setEnd($date, $endTime);
        $this->description = strip_tags($description);
        $this->notes = strip_tags($notes);
    }
    
    public function getId(): int
    {
        return $this->id;
    }
    
    public function getProjectId(): int
    {
        return $this->projectId;
    }
    
    public function getSituation(): string
    {
        return $this->situation;
    }
    
    public function getDate(string $format = "Y-m-d"): string
    {
        return $this->start->format($format);
    }
    
    public function getStartTime(): string
    {
        return $this->start->format("H:i");
    }
    
    public function getEndTime(): string
    {
        return $this->end->format("H:i");
    }
    
    public function getDiffTime(): string // Em minutos
    {
        $diff = $this->start->diff($this->end);
        return $diff->h * 60 + $diff->i;
    }
    
    public function setStart(string $date, string $startTime): void
    {
        $this->start = new DateTime($date . ' ' . $startTime);
    }
    
    public function setEnd(string $date, string $endTime): void
    {
        $this->end = new DateTime($date . ' ' . $endTime);
    }
    
    public function getDescription(): string
    {
        return $this->description;
    }
    
    public function getNotes(): ?string
    {
        return $this->notes;
    }
}
