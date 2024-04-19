<?php
// A class for uploading new course

require_once 'DBConn.php';

class CourseAdder {
    private $code, $name, $dept, $year, $sem;

    public function __construct($crsCode, $crsName, $dept, $year, $sem) {
        $this->code = $crsCode;
        $this->name = $crsName;
        $this->dept = $dept;
        $this->year = $year;
        $this->sem = $sem;
    }

    public function uploadToDB() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "INSERT INTO course(courseCode, courseName, courseDept, courseYear, courseSem) VALUES (:code, :name, :dept, :year, :sem)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':code' => $this->code,
            ':name' => $this->name,
            ':dept' => $this->dept,
            ':year' => $this->year,
            ':sem' => $this->sem
        ]);

        if ($result)
            echo "Query executed successfully.";
        else
            echo $conn->errorInfo();
    }
}