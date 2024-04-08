<?php

include "../model/dbConn.php";

class Student {
    public $stdID;
    public $stdFName;
    public $stdMName;
    public $stdLName;
    public $stdEmail;

    public function __construct($stdID, $stdFName, $stdMName, $stdLName, $stdEmail) {
        $this->stdID = $stdID;
        $this->stdFName = $stdFName;
        $this->stdMName = $stdMName;
        $this->stdLName = $stdLName;
        $this->stdEmail = $stdEmail;
    }
}

class StudentRepository {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllStudents() {
        $students = [];

        $query = "SELECT * FROM stdtable";
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $student = new Student(
                    $row['stdID'],
                    $row['stdFName'],
                    $row['stdMName'],
                    $row['stdLName'],
                    $row['stdEmail']
                );
                $students[] = $student;
            }

            // Close the database connection
            mysqli_close($this->conn);

            return $students;
        } else {
            // Handle database query error
            echo json_encode(array("error" => "Error fetching student data from the database"));
            return null;
        }
    }
}

// Create a new Database instance
$db = new Database($servername, $username, $password, $dbname);

// Create a new StudentRepository instance
$studentRepository = new StudentRepository($db->getConnection());

// Get all students from the database
$students = $studentRepository->getAllStudents();

// Set the response header to JSON
header('Content-Type: application/json');

// Encode the $students array as JSON and send it back
echo json_encode($students);

?>
