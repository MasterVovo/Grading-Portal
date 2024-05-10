<?php
// A class for assigning faculty to section and courses

require_once 'DBConn.php';

class FacultyAssigner {
    private $facultyID, $sectionID, $courseCode;

    public function __construct($facultyID, $sectionID, $courseCode) {
        $this->facultyID = $facultyID;
        $this->sectionID = $sectionID;
        $this->courseCode = $courseCode;
    }

    public function teacherExist() {
        $conn = DBConn::getInstance()->getConnection();

        $sql = 
        "SELECT * FROM assignment 
        WHERE sectionID = :sectionID
        AND courseCode = :courseID";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':sectionID' => $this->sectionID,
            ':courseID' => $this->courseCode
        ]);

        if ($stmt->rowCount() > 0)
            return true;
        else
            return false;
    }

    public function uploadToDB() {
        $conn = DBConn::getInstance()->getConnection();

        $sql = "INSERT INTO assignment(facultyID, sectionID, courseCode) VALUES (:facultyID, :sectionID, :courseID)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':facultyID' => $this->facultyID,
            ':sectionID' => $this->sectionID,
            ':courseID' => $this->courseCode
        ]);

        if ($result)
            return "Query executed successfully.";
        else
            return $conn->errorInfo();
    }

    public function updateTeacher() {
        $conn = DBConn::getInstance()->getConnection();

        $sql = 
        "UPDATE assignment
        SET facultyID = :facultyID
        WHERE sectionID = :sectionID
        AND courseCode = :courseID;";
        
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':facultyID' => $this->facultyID,
            ':sectionID' => $this->sectionID,
            ':courseID' => $this->courseCode
        ]);

        if ($result)
            return "Query executed successfully.";
        else
            return $conn->errorInfo();
    }
}