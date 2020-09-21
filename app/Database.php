<?php

namespace App;

use PDO;

class Database {

    private $pdo;

    private static $instance = null;

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    /**
     * Database constructor.
     */
    private function __construct() {
        try {
            $pdo = new PDO('sqlite:' . dirname(__DIR__) . '/db/database.sqlite');
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query) {
        return $this->pdo->query($query);
    }

    public function prepare($query) {
        return $this->pdo->prepare($query);
    }


}