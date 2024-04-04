<?php
// A singleton pdo mysql connection class
class DBConn {
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

    protected static function getInstance() {
        if (!(isset(self::$instance)))
            self::$instance = new DBConn();
        return self::$instance;
    }

    protected function getConnection() {
        return $this->conn;
    }
}


// class Test extends DBConn {
//     public function __construct() {
        
//     }
    
//     public static function testing() {
//         $conn = DBConn::getInstance()->getConnection();

//         $sql = "INSERT INTO stdtable(stdID, stdFName, stdMName, stdLName, stdEmail) VALUES (:id, :fname, :mname, :lname, :email)";

//         $stmt = $conn->prepare($sql);
//         $stmt->execute([
//             ':id' => 12345,
//             ':fname' => 'Hello',
//             ':mname' => 'Jason',
//             ':lname' => 'Foreman',
//             ':email' => 'jasonformat'
//         ]);
//     }
// }

// $test = new Test();
// $test->testing();