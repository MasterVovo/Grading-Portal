<?php
// A class for retrieving teacher data

require_once 'DBConn.php';

class FacultyFetcher {
    public function __construct() {

    }

    public function getAllFct() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT faculty.facultyID, faculty.facultyFName, faculty.facultyMName, faculty.facultyLName, faculty.facultyEmail, faculty.facultyStatus, facultyType.facultyType FROM faculty INNER JOIN facultytype on facultytype.facultyTypeID = faculty.facultyType WHERE facultyStatus IN (1,2)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }

    public function getFct($facultyID) {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT * FROM faculty WHERE facultyID = :facultyID";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':facultyID' => $facultyID
        ]);

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }
    
    public function countFct() {
        $conn = DBConn::getInstance()->getConnection();
        
        $currentYear = date('y');
        $sql = "SELECT COUNT(facultyID) AS fctCount FROM faculty WHERE facultyID LIKE 'KLD-$currentYear-%'";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }
}