<?php
// A class for retrieving grades data

require_once 'DBConn.php';

class GradeFetcher {
    public function __construct() {

    }

    public function getGradingID($stdID, $fctID, $crsCode) {
        $conn = DBConn::getInstance()->getConnection();
    
        $sql = 
        "SELECT gradeID 
        FROM grade
        WHERE studentID = :stdID
        AND teacherID = :fctID
        AND courseCode = :crsCode";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':stdID' => $stdID,
            ':fctID' => $fctID,
            ':crsCode' => $crsCode
        ]);
    
        if ($result) {
            return $stmt->fetchColumn();
        } else {
            return null;
        }
    }

    public function getApprovalID($gradeID) {
        $conn = DBConn::getInstance()->getConnection();
    
        $sql = 
        "SELECT gradeApproved 
        FROM grade
        WHERE gradeID = :gradeID";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':gradeID' => $gradeID
        ]);
    
        if ($result) {
            return $stmt->fetchColumn();
        } else {
            return $conn->errorInfo();
        }
    }

    public function approvedByReg($approvalID) {
        $conn = DBConn::getInstance()->getConnection();
    
        $sql = 
        "SELECT isApprovedByRegistrar 
        FROM approval
        WHERE approvalID = :approvalID";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':approvalID' => $approvalID
        ]);
    
        if ($result) {
            return $stmt->fetchColumn();
        } else {
            return $conn->errorInfo();
        }
    }

    public function getSubmittedGrades($facultyID, $sectionID, $courseCode) {
        $conn = DBConn::getInstance()->getConnection();
    
        $sql = 
        "SELECT student.studentID, student.studentFName, student.studentMName, student.studentLName, grade.gradeFinal, grade.gradeFeedback
        FROM student
        INNER JOIN grade
        ON student.studentID = grade.studentID
        WHERE student.studentSect = :section
        AND grade.teacherID = :teacher
        AND grade.courseCode = :course";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':section' => $sectionID,
            ':teacher' => $facultyID,
            ':course' => $courseCode
        ]);
    
        if ($result) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return $conn->errorInfo();
        }
    }
}