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
    
    public function getCrsByFctAndSct($fctID, $sctID) {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT courseCode FROM assignment WHERE facultyID = :fctID AND sectionID = :sctID";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            'fctID' => $fctID,
            'sctID' => $sctID
        ]);

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }

    public function getCrsByFct($fctID) {
        $conn = DBConn::getInstance()->getConnection();
        
        // "SELECT section.sectionID, section.sectionYearLvl, faculty.facultyFName, faculty.facultyMName, faculty.facultyLName FROM section INNER JOIN faculty ON section.sectionAdv=faculty.facultyID;";

        $sql = "SELECT course.courseCode, course.courseName, course.courseYear, course.courseSem FROM course INNER JOIN specialization ON specialization.facultyID = :fctID AND course.courseCode = specialization.courseCode";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            'fctID' => $fctID
        ]);

        if ($result)
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return "Failed to fetch data";
    }

    public function getByYearAndSem($year, $sem) {
        $conn = DBConn::getInstance()->getConnection();

        // "SELECT * FROM course INNER JOIN semester ON $date BETWEEN semester.startDate AND semester.endDate";

        $sql = "SELECT * FROM course WHERE courseYear = :year AND courseSem = :sem";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            'year' => $year,
            'sem' => $sem
        ]);

        if ($result)
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return "Failed to fetch data";
    }
}