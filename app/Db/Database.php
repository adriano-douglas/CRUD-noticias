<?php

namespace App\Db;

use PDO;
use PDOException;

class Database {
    const SERVER_NAME = 'localhost';
    const DB_NAME  = 'crud-noticias';
    const USER_NAME = 'root';
    const PASSWORD = '';

    private $connection;

    public function __construct() {
        $this->setConnection();
    }

    public function getConnection(){
        return $this->connection;
    }

    public function closeConnection(){
        $this->connection = null;
    }

    public function setConnection(){
        try {
            $this->connection = new PDO(
                'mysql:host='. self::SERVER_NAME .';
                dbname='. self::DB_NAME .'', 
                self::USER_NAME, 
                self::PASSWORD);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }
    }

    public function executeQuery($query, $params = []){
        try {
            $stmt = $this->getConnection()->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            exit;
        }
    }

    public function insert($query, $params = []){
        $this->executeQuery($query, $params);
        return $this->getConnection()->lastInsertId();
    }

    public function select($query, $params = []){
        return $this->executeQuery($query, $params);
    }
}