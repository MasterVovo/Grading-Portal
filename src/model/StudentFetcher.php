<?php
// A class for retrieving student data

require_once 'DBConn.php';

class StudentFetcher {
    public function __construct() {

    }

    public function getAllStd() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT studentID, studentFName, studentMName, studentLName, studentEmail, studentYear, studentSect FROM student";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }
}