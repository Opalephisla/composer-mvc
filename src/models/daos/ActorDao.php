<?php

namespace mvcobjet\models\daos;

use mvcobjet\models\entities\Actor;
use mvcobjet\models\daos\ConnectDao;

class ActorDao extends ConnectDao
{

    public function creeObj($fields)
    {
        $actor = new Actor();
        $actor->setId($fields['id']);
        $actor->setFirstName($fields['first_name']);
        $actor->setLastName($fields['last_name']);
        return $actor;
    }

    public function findAll()
    {
        $sql = "SELECT * FROM actor";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
            $actors = [];
            while ($row =  $stmt->fetch(\PDO::FETCH_ASSOC)) {
                //    $actors[] =  $this->creeObj($row) ;  
                array_push($actors, $this->creeObj($row));
            }
            return $actors;
        }
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM actor WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result) {
            $row =  $stmt->fetch(\PDO::FETCH_ASSOC);
            return $this->creeObj($row);
        }
    }

    public function findMoviesforActor($id)
    {
        $sql = "SELECT * FROM movie WHERE id IN (SELECT movie_id FROM movies_actors WHERE actor_id = :id)";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result) {
            $movies = [];
            while ($row =  $stmt->fetch(\PDO::FETCH_ASSOC)) {
                array_push($movies, $this->creeObj($row));
            }
            return $movies;
        }
    }

    public function findByMovie($id)
    {
        $sql = "SELECT * FROM actor WHERE id IN (SELECT actor_id FROM movies_actors WHERE movie_id = :id)";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result) {
            $actors = [];
            while ($row =  $stmt->fetch(\PDO::FETCH_ASSOC)) {
                array_push($actors, $this->creeObj($row));
            }
            return $actors;
        }
    }

    public function createActor($actor)
    {
        $sql = "INSERT INTO actor (first_name, last_name) VALUES (:first_name, :last_name)";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['first_name' => $actor['first_name'], 'last_name' => $actor['last_name']]);
        if ($result) {
            return $this->db->lastInsertId();
        }
    }
    public function updateActor($actor)
    {
        $sql = "UPDATE actor SET first_name = :first_name, last_name = :last_name WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['first_name' => $actor['first_name'], 'last_name' => $actor['last_name'], 'id' => $actor['id']]);
        if ($result) {
            return $this->db->lastInsertId();
        }
    }

    public function deleteActor($id)
    {
        $sql = "DELETE FROM actor WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result) {
            return $this->db->lastInsertId();
        }
    }
}
