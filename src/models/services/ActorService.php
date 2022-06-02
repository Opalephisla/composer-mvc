<?php

namespace mvcobjet\models\services;

use mvcobjet\models\daos\ActorDao;

class ActorService
{
    private $actorDao;
    public function __construct()
    {
        $this->actorDao = new ActorDao();
    }

    public function getAllActors()
    {
        return $this->actorDao->findAll();
    }

    public function getOneActor($id)
    {
        return $this->actorDao->findById($id);
    }
    public function getActorMovies($id)
    {
        return $this->actorDao->findMoviesforActor($id);
    }
    public function addActor($actor)
    {
        $this->actorDao->createActor($actor);
    }
    public function updateActor($actor)
    {
        $this->actorDao->updateActor($actor);
    }
    public function deleteActor($actor)
    {
        $this->actorDao->deleteActor($actor);
    }
}
