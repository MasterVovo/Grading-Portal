<?php
// A class for retrieving chart data

require_once 'DBConn.php';

class ChartFetcher {
    public function __construct() {

    }

    public function getActiveUsers() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT (SELECT COUNT(facultyStatus) FROM faculty WHERE facultyStatus IN (1, 2))+(SELECT COUNT(studentStatus) FROM student WHERE studentStatus IN (1, 2)) AS activeUsers;";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }

    public function getTotalStudent() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT COUNT(studentID) AS totalStd FROM student";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }

    public function getTotalFaculty() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT COUNT(facultyID) AS totalFct FROM faculty";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }

    public function getTotalFailures() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = 
        "SELECT COUNT(gradeID) AS totalFails 
        FROM grade
        WHERE gradeFinal > 3.00";


        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return $stmt->fetch();
        else
            return ["error" => "Failed to fetch data"];
    }

    public function getTotalPassers() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = 
        "SELECT COUNT(gradeID) AS totalPasses 
        FROM grade
        WHERE gradeFinal <= 3.00";


        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return $stmt->fetch();
        else
            return ["error" => "Failed to fetch data"];
    }

    public function getAvgGrade($yearLvl) {
        $conn = DBConn::getInstance()->getConnection();

        $sql = 
        "SELECT AVG(grade.gradeFinal) AS avgGrade
        FROM grade
        INNER JOIN student
        ON grade.studentID = student.studentID
        INNER JOIN section
        ON student.studentSect = section.sectionID
        AND section.sectionYearLvl = :yearLvl";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':yearLvl' => $yearLvl
        ]);

        if ($result)
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return $conn->errorInfo();
    
    }

    public function countStudents($yearLvl) {
        $conn = DBConn::getInstance()->getConnection();

        $sql = 
        "SELECT COUNT(student.studentID) AS studentCount
        FROM student
        INNER JOIN section
        ON student.studentSect = section.sectionID
        AND section.sectionYearLvl = :yearLvl";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':yearLvl' => $yearLvl
        ]);

        if ($result)
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return $conn->errorInfo();
    
    }

    public function getGradeHistory($stdYear, $yearLvl, $semester) {
        $conn = DBConn::getInstance()->getConnection();

        $sql = 
        "SELECT grade.gradeFinal 
        FROM grade
        INNER JOIN student
        ON grade.studentID = student.studentID
        INNER JOIN section
        ON student.studentSect = section.sectionID
        AND section.sectionYearLvl = :stdYear
        INNER JOIN course
        ON course.courseCode = grade.courseCode
        AND course.courseYear = :yearLvl
        AND course.courseSem = :sem";

        // $sql = 
        // "SELECT grade.gradeFinal 
        // FROM grade
        // INNER JOIN student
        // ON grade.studentID = student.studentID
        // INNER JOIN section
        // ON student.studentSect = section.sectionID
        // AND section.sectionYearLvl = :yearLvl
        // INNER JOIN course
        // ON course.courseCode = grade.courseCode
        // AND course.courseSem = :sem";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':stdYear' => $stdYear,
            ':yearLvl' => $yearLvl,
            ':sem' => $semester
        ]);

        if ($result)
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return $conn->errorInfo();
    
    }
}