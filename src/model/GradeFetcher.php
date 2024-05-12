<?php
// A class for retrieving grades data

require_once 'DBConn.php';

class GradeFetcher {
    public function __construct() {

    }

    public function getGradingID($stdID, $fctID, $crsCode) {
        $conn = DBConn::getInstance()->getConnection();
    
        $sql = 
        "SELECT gradeID 
        FROM grade
        WHERE studentID = :stdID
        AND teacherID = :fctID
        AND courseCode = :crsCode";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':stdID' => $stdID,
            ':fctID' => $fctID,
            ':crsCode' => $crsCode
        ]);
    
        if ($result) {
            return $stmt->fetchColumn();
        } else {
            return null;
        }
    }
}