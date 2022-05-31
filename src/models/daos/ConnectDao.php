<?php
// DAO : Data Access Object. 
namespace mvcobjet\models\daos;

use PDO;

class ConnectDao
{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=bootstrap;charset=utf8", "root", "");
    }
}
