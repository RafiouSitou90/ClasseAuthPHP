<?php

namespace App\Classes;

use PDO;

class Database {
    
    private $host;
    private $username;
    private $password;
    private $database;

    public function __construct($host, $username, $password, $database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    /**
     * @return PDO
     */
    public function getPDO(): PDO
    {
        $pdo = new PDO("mysql:host=$this->host;dbname=$this->database;charset=utf8mb4", 
                $this->username, $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );

        return $pdo;
    }
}