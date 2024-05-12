<?php

require_once 'DBConn.php';

class GradeUploader {
    public function __construct() {
        
    }

    // public function uploadToMidterm($grade, $section, $stdID, $feedback, $fctID, $course) {
    //     $conn = DBConn::getInstance()->getConnection();

    //     $sql = "INSERT INTO grade(studentID, teacherID, courseCode, gradeMidterm, gradeFeedback) VALUES (:studentID, :facultyID, :courseCode, :gradeMidterm, :gradeFeedback)";
    //     $stmt = $conn->prepare($sql);
    //     $result = $stmt->execute([
    //         ':studentID' => $stdID,
    //         ':facultyID' => $fctID,
    //         ':courseCode' => $course,
    //         ':gradeMidterm' => $grade,
    //         ':gradeFeedback' => $feedback
    //     ]);


    //     // $affectedRows = 0;
    //     // foreach ($this->grades as $id => $data) {
    //     //     $result = $stmt->execute([
    //     //         ':studentID' => $id,
    //     //         ':facultyID' => $facultyID,
    //     //         ':courseCode' => $courseCode,
    //     //         ':gradeMidterm' => $data->grade,
    //     //         ':gradeFeedback' => $data->feedback
    //     //     ]);
    //     //     if ($result)
    //     //         $affectedRows++;
    //     // }
        
    //     if ($result)
    //         echo "Query executed successfully.";
    //     else {
    //         echo $conn->errorInfo();    
    //     }
    // }

    public function uploadToMidterm($grade, $section, $stdID, $feedback, $fctID, $course) {
        if ($course === null) {
            echo "Error: courseCode cannot be null.";
            return;
        }
    
        $conn = DBConn::getInstance()->getConnection();
    
        $sql = "INSERT INTO grade(studentID, teacherID, courseCode, gradeMidterm, gradeFeedback) VALUES (:studentID, :facultyID, :courseCode, :gradeMidterm, :gradeFeedback)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':studentID' => $stdID,
            ':facultyID' => $fctID,
            ':courseCode' => $course,
            ':gradeMidterm' => $grade,
            ':gradeFeedback' => $feedback
        ]);
    
        if ($result) {
            echo "Query executed successfully.";
        } else {
            echo $conn->errorInfo();
        }
    }

    public function uploadToFinal($gradeID, $grade, $feedback) {
        $conn = DBConn::getInstance()->getConnection();
    
        $sql = 
        "UPDATE grade 
        SET gradeFinal = :gradeFinal, gradeFeedback = :gradeFeedback
        WHERE gradeID = :gradeID";
        
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':gradeFinal' => $grade,
            ':gradeFeedback' => $feedback,
            ':gradeID' => $gradeID
        ]);
    
        if ($result) {
            return 'Query executed successfully.';
        } else {
            return $conn->errorInfo();
        }
    }

    public function createRecord($stdID, $fctID, $crsCode) {
        $conn = DBConn::getInstance()->getConnection();
    
        $sql = "INSERT INTO grade(studentID, teacherID, courseCode) VALUES (:studentID, :facultyID, :courseCode)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':studentID' => $stdID,
            ':facultyID' => $fctID,
            ':courseCode' => $crsCode
        ]);
    
        if ($result) {
            return $conn->lastInsertID();
        } else {
            return $conn->errorInfo();
        }
    }
}