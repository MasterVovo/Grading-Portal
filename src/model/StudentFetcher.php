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

    public function getStdBySessionID($facultyID) {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT student.studentID, student.studentFName, student.studentMName, student.studentLName, student.studentSect, grade.gradeID, grade.gradeMidterm, grade.gradeFinal, grade.gradeSemestral FROM student INNER JOIN grade ON section.sectionAdv = " . $facultyID . " AND student.studentSect = section.sectionID AND grade.studentID = student.studentID";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }
}