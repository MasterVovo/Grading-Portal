<?php
// A class for retrieving course data

require_once 'DBConn.php';

class CourseFetcher {
    public function __construct() {

    }

    public function getAllCrs() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT courseCode, courseName, courseYear, courseSem FROM course";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }

    public function getAllCrsId() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT courseCode FROM course";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }
}