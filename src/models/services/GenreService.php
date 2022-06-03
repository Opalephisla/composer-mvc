<?php

namespace mvcobjet\models\services;

use mvcobjet\models\daos\GenreDao;


class GenreService
{
    private $genreDao;
    public function __construct()
    {
        $this->genreDao = new GenreDao();
    }

    public function getAllGenres()
    {
        return $this->movieDao->findAll();
    }

    public function getOneGenre($id)
    {
        return $this->movieDao->findById($id);
    }
    public function addGenre($movie)
    {
        $this->movieDao->createGenre($movie);
    }
    public function updateGenre($movie)
    {
        $this->movieDao->updateGenre($movie);
    }
    public function deleteGenre($movie)
    {
        $this->movieDao->deleteGenre($movie);
    }
}
