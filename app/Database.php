<?php

namespace App;

use PDO;
use PDOStatement;

/**
 * Class Database
 * Singleton to manage database access
 * @package App
 */
class Database {

    private $pdo;

    private static $instance = null;

    /**
     * @return Database Singleton instance
     */
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

    /**
     * Execute an SQL query
     * @param $query
     * @return false|PDOStatement
     */
    public function query($query) {
        return $this->pdo->query($query);
    }

    /**
     * Prepare an SQL query
     * @param $query
     * @return bool|PDOStatement
     */
    public function prepare($query) {
        return $this->pdo->prepare($query);
    }


}