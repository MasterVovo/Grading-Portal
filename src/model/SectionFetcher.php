<?php
// A class for retrieving section data

require_once 'DBConn.php';

class SectionFetcher {
    public function __construct() {

    }

    public function getAllSct() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT section.sectionID, section.sectionYearLvl, faculty.facultyFName, faculty.facultyMName, faculty.facultyLName FROM section INNER JOIN faculty ON section.sectionAdv=faculty.facultyID;";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }

    public function get($sctID) {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT * FROM section WHERE sectionID = :sctID;";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            'sctID' => $sctID
        ]);

        if ($result)
            return $stmt->fetch();
        else
            return "Failed to get section data";
    }

    public function getSctByYear($year) {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT sectionID FROM section WHERE sectionYearLvl = " . $year;
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }

    public function getAllSctId() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT sectionID FROM section";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }

    public function getSctByFct($facultyID) {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT DISTINCT sectionID FROM assignment WHERE facultyID = :facultyID";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            'facultyID' => $facultyID
        ]);

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }

    
}