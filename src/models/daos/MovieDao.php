<?php

namespace mvcobjet\models\daos;

use mvcobjet\models\entities\Movie;
use mvcobjet\models\daos\ConnectDao;

class MovieDao extends ConnectDao
{

    public function creeObj($fields)
    {
        $movie = new Movie();
        $movie->setId($fields['id']);
        $movie->setTitle($fields['title']);
        $movie->setDescription($fields['description']);
        $movie->setDuration($fields['duration']);
        $movie->setReleaseDate($fields['date']);
        $movie->setCover($fields['cover_image']);
        $movie->setGenre($fields['genre_id']);
        $movie->setDirector($fields['director_id']);
        return $movie;
    }

    public function findAll()
    {
        $sql = "SELECT * FROM movie";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
            $movies = [];
            while ($row =  $stmt->fetch(\PDO::FETCH_ASSOC)) {
                //    $movies[] =  $this->creeObj($row) ;  
                array_push($movies, $this->creeObj($row));
            }
            return $movies;
        }
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM movie WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result) {
            $row =  $stmt->fetch(\PDO::FETCH_ASSOC);
            return $this->creeObj($row);
        }
    }

    public function createMovie($movie)
    {
        $sql = "INSERT INTO movie (title, description, duration, date, cover_image, genre_id, director_id) VALUES (:title, :description, :duration, :date, :cover_image, :genre_id, :director_id)";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['title' => $movie['title'], 'description' => $movie['description'], 'duration' => $movie['duration'], 'date' => $movie['date'], 'cover_image' => $movie['cover_image'], 'genre_id' => $movie['genre_id'], 'director_id' => $movie['director_id']]);
        if ($result) {
            return $this->db->lastInsertId();
        }
    }
    public function updateMovie($movie)
    {
        $sql = "UPDATE movie SET title = :title, description = :description, duration = :duration, cover_image = :cover_image, genre_id = :genre_id, director_id = :director_id WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['title' => $movie['title'], 'description' => $movie['description'], 'duration' => $movie['duration'], 'cover_image' => $movie['cover_image'], 'genre_id' => $movie['genre_id'], 'director_id' => $movie['director_id'], 'id' => $movie['id']]);
        if ($result) {
            return $this->db->lastInsertId();
        }
    }

    public function deleteMovie($id)
    {
        $sql = "DELETE FROM movie WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result) {
            return $this->db->lastInsertId();
        }
    }
    public function findGenre($id)
    {
        $sql = "SELECT * FROM genre WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result) {
            $row =  $stmt->fetch(\PDO::FETCH_ASSOC);
            return $this->creeObj($row);
        }
    }
}
