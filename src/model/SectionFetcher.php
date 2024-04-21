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
}