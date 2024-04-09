<?php
// A singleton pdo mysql connection class

final class DBConn {
    private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $db = 'grading_system';
    private $charset = 'UTF8';

    private $user = 'root';
    private $pass = '';
    
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    
    private function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db};charset={$this->charset};", $this->user, $this->pass, $this->options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getInstance() {
        if (!(isset(self::$instance)))
            self::$instance = new DBConn();
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}