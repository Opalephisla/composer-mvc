<?php

namespace mvcobjet\controllers;

use mvcobjet\models\services\ActorService;
use mvcobjet\models\services\DirectorService;
use mvcobjet\models\services\MovieService;

class FrontController
{
    private $directorService;
    private $actorService;
    private $twig;

    public function __construct($t)
    {
        $this->twig = $t;
        $this->actorService = new ActorService();
        $this->directorService = new DirectorService();
        $this->movieService = new MovieService();
    }

    public function listActors()
    {
        $result = $this->actorService->getAllActors();
        echo $this->twig->render('actors.html.twig', ['actors' => $result]);
    }
    public function getActor($id)
    {
        $res = $this->actorService->getOneActor($id);
        echo $this->twig->render('actor.html.twig', ['actor' => $res]);
    }
    public function getMoviesforActor($id)
    {
        $res = $this->actorService->getActorMovies($id);
        return $res;
    }
    public function listDirectors()
    {
        $res = $this->directorService->getAllDirectors();
        echo $this->twig->render('directors.html.twig', ['directors' => $res]);
    }
    public function getDirector($id)
    {
        $res = $this->directorService->getOneDirector($id);
        echo $this->twig->render('director.html.twig', ['director' => $res]);
    }
    public function getMoviesforDirector($id)
    {
        $res = $this->directorService->getDirectorMovies($id);
        return $res;
    }
    public function listMovies()
    {
        $res = $this->movieService->getAllMovies();
        echo $this->twig->render('movies.html.twig', ['movies' => $res]);
    }
    public function getMovie($id)
    {
        $res = $this->movieService->getById($id);
        echo $this->twig->render('movie.html.twig', ['movie' => $res]);
    }
    public function getMovieGenre($id)
    {
        $res = $this->movieService->getMovieGenre($id);
        return $res;
    }
    public function addActor()
    {
        echo $this->twig->render('newactor.html.twig');
    }
    public function updateActor($id)
    {
        $res = $this->actorService->updateActor($id);
        echo $this->twig->render('updateactor.html.twig', ['actor' => $res]);
    }
    public function addDirector()
    {
        echo $this->twig->render('newdirector.html.twig');
    }
    public function addMovie()
    {
        echo $this->twig->render('newmovie.html.twig');
    }
}
