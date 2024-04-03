<?php
// A singleton pdo mysql connection class
class DBConn {
    private static $instance;
    private $db;

    private $host = 'localhost';
    private $port = '3306';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'grading_system';
    
    private function __construct() {
        try {
            $this->db = new PDO("host={$this->host};port={$this->port};");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    protected static function getInstance() {
        if (!(self::$instance)) {
            self::$instance = new DBConn();
        }
        return self::$instance;
    }

    protected function getDatabase() {
        return $this->db;
    }
}