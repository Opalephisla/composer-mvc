<?php

namespace mvcobjet\controllers;

use mvcobjet\models\daos\ActorDao;

class BackController
{

    public function index()
    {
        echo "<h1>Hello mvcobjet du BackController</h1>";
    }
    public function liste()
    {
        $actors = new ActorDao();
        $result = $actors->findAll();
        echo "<h1>Liste des acteurs</h1>";
        echo "<ul>";
        foreach ($result as $actor) {
            echo "<li>" . $actor->getFirstName() . " " . $actor->getLastName() . "</li>";
        }
        echo "</ul>";
    }
    function getActor($id)
    {
        $actors = (new ActorDao())->findById($id);
        echo "<h1>Acteurs</h1>";
        echo "<ul>";
        echo "<li>" . $actors->getFirstName() . " " . $actors->getLastName() . "</li>";
        echo "</ul>";
    }
}
