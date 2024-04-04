<?php
include "../model/dbConn.php";

class Subjects {
    public $crsID;
    public $crsCode;
    public $crsTitle;

    public function __construct($crsID, $crsCode, $crsTitle) {
        $this->crsID = $crsID;
        $this->crsCode = $crsCode;
        $this->crsTitle = $crsTitle;
    }
}

class RetrieveSubjects {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllSubjects() {
        $subjects = [];

        // Get database connection
        $conn = $this->db->getConnection();

        $query = "SELECT * FROM crstable";
        $result = mysqli_query($conn, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $student = new Subjects(
                    $row['crsID'],
                    $row['crsCode'],
                    $row['crsTitle']
                );
                $subjects[] = $student;
            }

            // Close the database connection
            $this->db->closeConnection();

            return $subjects;
        } else {
            echo "Error fetching student data from the database";
            return null;
        }
    }
}

// Create a new Database instance
$db = new Database($servername, $username, $password, $dbname);

// Create a new RetrieveSubjects instance
$retrieveSubjects = new RetrieveSubjects($db);

// Get all students from the database
$subjects = $retrieveSubjects->getAllSubjects();

// Set the response header to JSON
header('Content-Type: application/json');

// Encode the $subjects array as JSON and send it back
echo json_encode($subjects);
?>
