<?php

namespace mvcobjet\models\services;

use mvcobjet\models\daos\DirectorDao;

class DirectorService
{
    private $directorDao;
    public function __construct()
    {
        $this->directorDao = new DirectorDao();
    }

    public function getAllDirectors()
    {
        return $this->directorDao->findAll();
    }

    public function getOneDirector($id)
    {
        return $this->directorDao->findById($id);
    }
    public function getDirectorMovies($id)
    {
        return $this->directorDao->findMoviesforDirector($id);
    }
    public function addDirector($director)
    {
        $objDirector = $this->directorDao->creeObj($director);
        $this->directorDao->createDirector($objDirector);
    }
    public function updateDirector($director)
    {
        $this->directorDao->updateDirector($director);
    }
    public function deleteDirector($director)
    {
        $this->directorDao->deleteDirector($director);
    }
}
