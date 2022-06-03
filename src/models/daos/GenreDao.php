<?php

namespace mvcobjet\models\daos;

use mvcobjet\models\entities\Genre;
use mvcobjet\models\daos\ConnectDao;

class GenreDao extends ConnectDao
{

    public function creeObj($fields)
    {
        $genre = new Genre();
        $genre->setId($fields['id']);
        $genre->setName($fields['name']);
        return $genre;
    }

    public function findAll()
    {
        $sql = "SELECT * FROM genre";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
            $genres = [];
            while ($row =  $stmt->fetch(\PDO::FETCH_ASSOC)) {
                //    $genres[] =  $this->creeObj($row) ;  
                array_push($genres, $this->creeObj($row));
            }
            return $genres;
        }
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM genre WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result) {
            $row =  $stmt->fetch(\PDO::FETCH_ASSOC);
            return $this->creeObj($row);
        }
    }

    public function createGenre($genre)
    {
        $sql = "INSERT INTO genre (title, description, duration, date, cover_image, genre_id, director_id) VALUES (:title, :description, :duration, :date, :cover_image, :genre_id, :director_id)";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['title' => $genre['title'], 'description' => $genre['description'], 'duration' => $genre['duration'], 'date' => $genre['date'], 'cover_image' => $genre['cover_image'], 'genre_id' => $genre['genre_id'], 'director_id' => $genre['director_id']]);
        if ($result) {
            return $this->db->lastInsertId();
        }
    }
    public function updateGenre($genre)
    {
        $sql = "UPDATE genre SET title = :title, description = :description, duration = :duration, cover_image = :cover_image, genre_id = :genre_id, director_id = :director_id WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['title' => $genre['title'], 'description' => $genre['description'], 'duration' => $genre['duration'], 'cover_image' => $genre['cover_image'], 'genre_id' => $genre['genre_id'], 'director_id' => $genre['director_id'], 'id' => $genre['id']]);
        if ($result) {
            return $this->db->lastInsertId();
        }
    }

    public function deleteGenre($id)
    {
        $sql = "DELETE FROM genre WHERE id = :id";
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
    public function findGenreByMovie($id)
    {
        $sql = "SELECT genre.id, genre.name FROM genre INNER JOIN movie ON genre.id = movie.genre_id WHERE movie.id = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result) {
            $row =  $stmt->fetch(\PDO::FETCH_ASSOC);
            return $this->creeObj($row);
        }
    }
}
