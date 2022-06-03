<?php

namespace mvcobjet\models\services;

use mvcobjet\models\daos\MovieDao;
use mvcobjet\models\daos\ActorDao;
use mvcobjet\models\daos\DirectorDao;
use mvcobjet\models\daos\GenreDao;


class MovieService
{
    private $movieDao;
    private $actorDao;
    private $directorDao;
    private $genreDao;
    public function __construct()
    {
        $this->movieDao = new MovieDao();
        $this->actorDao = new ActorDao();
        $this->directorDao = new DirectorDao();
        $this->genreDao = new GenreDao();
    }

    public function getAllMovies()
    {
        return $this->movieDao->findAll();
    }

    public function getOneMovie($id)
    {
        return $this->movieDao->findById($id);
    }
    public function addMovie($movie)
    {
        $this->movieDao->createMovie($movie);
    }
    public function updateMovie($movie)
    {
        $this->movieDao->updateMovie($movie);
    }
    public function deleteMovie($movie)
    {
        $this->movieDao->deleteMovie($movie);
    }
    public function getMovieGenre($id)
    {
        return $this->movieDao->findGenre($id);
    }
    public function getbyId($id)
    {
        $movie = $this->movieDao->findById($id);  // recherche dans movieDao ( $id = id du movie )
        $actors = $this->actorDao->findByMovie($id); // recherche des acteurs pour 1 film 
        foreach ($actors as $actor) {
            // fonction dans la classe Movie dans Entities
            $movie->setActors($actor);  // fonction ajoute 1 acteur à l'objet movie (voire classe/entité Movie)
        }

        $genre = $this->genreDao->findGenreByMovie($id); // recherche du genre 
        $movie->setGenre($genre);
        $director = $this->directorDao->findByMovie($id);
        $movie->setDirector($director);

        /* $comments = $this->commentDao->findByMovie($id);*/
        return $movie;
    }
}
