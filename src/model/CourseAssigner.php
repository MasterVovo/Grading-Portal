<?php
// A class for assigning courses to teachers

require_once 'DBConn.php';

class CourseAssigner {
    private $facultyID;
    private $courseCode;

    public function __construct($facultyID, $courseCode) {
        $this->facultyID = $facultyID;
        $this->courseCode = $courseCode;
    }

    public function assignCourse() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "INSERT INTO specialization(facultyID, courseCode) VALUES (:faculty, :course)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':faculty' => $this->facultyID,
            ':course' => $this->courseCode
        ]);

        if ($stmt->rowCount() > 0)
            return true;
        else
            return $conn->errorInfo();
    }

    public function specializationExist() {
        $conn = DBConn::getInstance()->getConnection();

        $sql = "SELECT * FROM specialization WHERE facultyID = :faculty AND courseCode = :course;";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':faculty' => $this->facultyID,
            ':course' => $this->courseCode
        ]);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($rows) > 0)
            return true;
        else
            return false;
    }
}