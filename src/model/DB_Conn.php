<?php

class Database {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    // Constructor to initialize database connection
    public function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method to get the database connection
    public function getConnection() {
        return $this->conn;
    }

    // Method to close the database connection
    public function closeConnection() {
        $this->conn->close();
    }
}

// Usage example:
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grading_system";

// Create a new Database instance
$database = new Database($servername, $username, $password, $dbname);

// Get the database connection
$conn = $database->getConnection();

// Use the connection for database operations

// Close the database connection when done
$database->closeConnection();

?>
