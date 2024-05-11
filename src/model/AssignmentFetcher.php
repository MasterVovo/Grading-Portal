<?php
// A class for retrieving faculty section and course assignment

require_once 'DBConn.php';

class AssignmentFetcher {
    public function __construct() {

    }

    public function getAssnByFct($facultyID) {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT * FROM assignment WHERE facultyID = :facultyID";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':facultyID' => $facultyID
        ]);

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }

    public function getByFctAndSct($facultyID, $sectionID) {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT * FROM assignment WHERE facultyID = :facultyID AND sectionID = :sectionID";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':facultyID' => $facultyID,
            ':sectionID' => $sectionID
        ]);

        if ($result)
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return "Failed to get assignment.";
    }
}