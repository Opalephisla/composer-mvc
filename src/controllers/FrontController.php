<?php

namespace mvcobjet\controllers;

use mvcobjet\models\services\ActorService;
use mvcobjet\models\services\DirectorService;
use mvcobjet\models\services\MovieService;

class FrontController
{
    private $actorService;
    private $directorService;
    public function __construct()
    {
        $this->actorService = new ActorService();
        $this->directorService = new DirectorService();
        $this->movieService = new MovieService();
    }
    public function listActors()
    {
        $res = $this->actorService->getAllActors();
        return $res;
    }
    public function getActor($id)
    {
        $res = $this->actorService->getOneActor($id);
        return $res;
    }
    public function getMoviesforActor($id)
    {
        $res = $this->actorService->getActorMovies($id);
        return $res;
    }
    public function listDirectors()
    {
        $res = $this->directorService->getAllDirectors();
        return $res;
    }
    public function getDirector($id)
    {
        $res = $this->directorService->getOneDirector($id);
        return $res;
    }
    public function getMoviesforDirector($id)
    {
        $res = $this->directorService->getDirectorMovies($id);
        return $res;
    }
    // list movies
    public function listMovies()
    {
        $res = $this->movieService->getAllMovies();
        return $res;
    }
    // get one movie
    public function getMovie($id)
    {
        $res = $this->movieService->getOneMovie($id);
        return $res;
    }
    // get movie genre
    public function getMovieGenre($id)
    {
        $res = $this->movieService->getMovieGenre($id);
        return $res;
    }
}
