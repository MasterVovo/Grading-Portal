<?php
// A class for uploading new course

require_once 'DBConn.php';

class CourseAdder {
    private $code, $name, $year, $sem;

    public function __construct($crsCode, $crsName, $year, $sem) {
        $this->code = $crsCode;
        $this->name = $crsName;
        $this->year = $year;
        $this->sem = $sem;
    }

    public function uploadToDB() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "INSERT INTO course(courseCode, courseName, courseYear, courseSem) VALUES (:code, :name, :year, :sem)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':code' => $this->code,
            ':name' => $this->name,
            ':year' => $this->year,
            ':sem' => $this->sem
        ]);

        if ($result)
            echo "Query executed successfully.";
        else
            echo $conn->errorInfo();
    }
}