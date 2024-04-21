<?php
// A class for retrieving faculty section and course assignment

require_once 'DBConn.php';

class AssignmentFetcher {
    public function __construct() {

    }

    public function getAssnByFct($facultyID) {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT * FROM assignment WHERE facultyID = " . $facultyID;
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }
}