<?php

namespace mvcobjet\models\services;

use mvcobjet\models\daos\MovieDao;

class MovieService
{
    private $movieDao;
    public function __construct()
    {
        $this->movieDao = new MovieDao();
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
}
