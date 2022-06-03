<?php

namespace mvcobjet\Models\Entities;

class Movie
{
    private $id;
    private $title;
    private $description;
    private $duration;
    private $date;
    private $coverImage;
    private $genre;
    private $director;
    private $actors;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): Movie
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Movie
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Movie
    {
        $this->description = $description;
        return $this;
    }

    public function getDuration(): string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): Movie
    {
        $this->duration = $duration;
        return $this;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate($date): Movie
    {
        $this->date = $date;
        return $this;
    }

    public function getCoverImage(): string
    {
        return $this->coverImage;
    }

    public function setCoverImage(string $coverImage): Movie
    {
        $this->coverImage = $coverImage;
        return $this;
    }

    public function getGenre(): Genre
    {
        return $this->genre;
    }

    public function setGenre(Genre $genre): Movie
    {
        $this->genre = $genre;
        return $this;
    }


    public function getDirector(): Director
    {
        return $this->director;
    }


    public function setDirector(Director $director): Movie
    {
        $this->director = $director;
        return $this;
    }

    public function getActors()
    {
        return $this->actors;
    }

    public function setActors($actors): Movie
    {
        $this->actors = $actors;
        return $this;
    }

    public function addActor(Actor $actor): void
    {
        foreach ($this->actors as $actor) {
            if (!in_array($actor, $this->actors)) {
                $this->actors[] = $actor;
            }
        }
    }
}
