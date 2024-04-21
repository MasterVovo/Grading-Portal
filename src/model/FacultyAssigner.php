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

    public function uploadToDB() {
        $conn = DBConn::getInstance()->getConnection();

        $sql = "INSERT INTO assignment(facultyID, sectionID, courseID) VALUES (:facultyID, :sectionID, :courseID)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':facultyID' => $this->facultyID,
            ':sectionID' => $this->sectionID,
            ':courseID' => $this->courseCode
        ]);

        if ($result)
            echo "Query executed successfully.";
        else
            echo $conn->errorInfo();
    }
}