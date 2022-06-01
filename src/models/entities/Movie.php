<?php

namespace mvcobjet\models\entities;

class Movie
{
    private $id;
    private $title;
    private $description;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $f)
    {
        $this->title =  $f;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $l)
    {
        $this->description =  $l;
    }
    public function setDuration(string $d)
    {
        $this->duration =  $d;
    }
    public function getDuration(): string
    {
        return $this->duration;
    }
    public function setReleaseDate(string $d)
    {
        $this->releaseDate =  $d;
    }
    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }
    public function setCover(string $d)
    {
        $this->cover =  $d;
    }
    public function getCover(): string
    {
        return $this->cover;
    }
    public function setGenre(string $d)
    {
        $this->genre =  $d;
    }
    public function getGenre(): string
    {
        return $this->genre;
    }
    public function setDirector(string $d)
    {
        $this->director =  $d;
    }
    public function getDirector(): string
    {
        return $this->director;
    }
}
