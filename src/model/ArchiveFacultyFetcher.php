<?php
// A class for retrieving teacher data

require_once 'DBConn.php';

class FacultyFetcher {
    public function __construct() {

    }

    public function getAllFct() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT facultyID, facultyFName, facultyMName, facultyLName, facultyEmail FROM archivefaculty";
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
}