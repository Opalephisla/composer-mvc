<?php

namespace mvcobjet\controllers;

use mvcobjet\models\daos\ActorDao;
use mvcobjet\models\services\ActorService;

class BackController
{
    private $actorService;
    public function __construct()
    {
        $this->actorService = new ActorService();
    }
    public function addActor($request)
    {
        $res = $this->actorService->addActor($request);
        return $res;
    }
    public function updateActor($request)
    {
        $res = $this->actorService->updateActor($request);
        return $res;
    }
    public function findbyId($id)
    {
        $res = $this->actorService->getOneActor($id);
        return $res;
    }
}
