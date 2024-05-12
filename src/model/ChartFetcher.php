<?php
// A class for retrieving chart data

require_once 'DBConn.php';

class ChartFetcher {
    public function __construct() {

    }

    public function getActiveUsers() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT (SELECT COUNT(facultyStatus) FROM faculty WHERE facultyStatus IN (1, 2))+(SELECT COUNT(studentStatus) FROM student WHERE studentStatus IN (1, 2)) AS activeUsers;";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }

    public function getTotalStudent() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT COUNT(studentID) AS totalStd FROM student";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }

    public function getTotalFaculty() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT COUNT(facultyID) AS totalFct FROM faculty";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }
}