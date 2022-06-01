<?php

namespace mvcobjet\models\daos;

use mvcobjet\models\entities\Director;
use mvcobjet\models\daos\ConnectDao;

class DirectorDao extends ConnectDao
{

    public function creeObj($fields)
    {
        $director = new Director();
        $director->setId($fields['id']);
        $director->setFirstName($fields['first_name']);
        $director->setLastName($fields['last_name']);
        return $director;
    }

    public function findAll()
    {
        $sql = "SELECT * FROM director";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
            $directors = [];
            while ($row =  $stmt->fetch(\PDO::FETCH_ASSOC)) {
                //    $directors[] =  $this->creeObj($row) ;  
                array_push($directors, $this->creeObj($row));
            }
            return $directors;
        }
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM director WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result) {
            $row =  $stmt->fetch(\PDO::FETCH_ASSOC);
            return $this->creeObj($row);
        }
    }

    public function findMoviesforDirector($id)
    {
        $sql = "SELECT * FROM movie WHERE id IN (SELECT movie_id FROM movies_directors WHERE director_id = :id)";
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

    public function createDirector($director)
    {
        $sql = "INSERT INTO director (first_name, last_name) VALUES (:first_name, :last_name)";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['first_name' => $director['first_name'], 'last_name' => $director['last_name']]);
        if ($result) {
            return $this->db->lastInsertId();
        }
    }
    public function updateDirector($director)
    {
        $sql = "UPDATE director SET first_name = :first_name, last_name = :last_name WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['first_name' => $director['first_name'], 'last_name' => $director['last_name'], 'id' => $director['id']]);
        if ($result) {
            return $this->db->lastInsertId();
        }
    }
    public function deleteDirector($id)
    {
        $sql = "DELETE FROM director WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result) {
            return $this->db->lastInsertId();
        }
    }
}
