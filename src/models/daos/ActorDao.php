<?php

namespace mvcobjet\models\daos;

use mvcobjet\models\entities\Actor;
use mvcobjet\models\daos\ConnectDao;

class ActorDao extends ConnectDao
{

    public function creeObj($fields)
    {
        $acteur = new Actor();
        $acteur->setId($fields['id']);
        $acteur->setFirstName($fields['first_name']);
        $acteur->setLastName($fields['last_name']);
        return $acteur;
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
}
