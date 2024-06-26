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
            return $conn->errorInfo();
        }
    }

    public function gradeExist($term, $stdID, $fctID, $crsCode) {
        $conn = DBConn::getInstance()->getConnection();
    
        if ($term == 'midterm') {
            $sql = 
            "SELECT gradeID 
            FROM grade
            WHERE studentID = :stdID
            AND teacherID = :fctID
            AND courseCode = :crsCode
            AND gradeMidterm <> 0.00";
        } else if ($term == 'final') {
            $sql = 
            "SELECT gradeID 
            FROM grade
            WHERE studentID = :stdID
            AND teacherID = :fctID
            AND courseCode = :crsCode
            AND gradeFinal <> 0.00";
        }
        
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':stdID' => $stdID,
            ':fctID' => $fctID,
            ':crsCode' => $crsCode
        ]);
    
        if ($result) {
            return $stmt->fetchColumn();
        } else {
            return $conn->errorInfo();
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

    public function approvedByReg($term, $approvalID) {
        $conn = DBConn::getInstance()->getConnection();
    
        if ($term == 'midterm') {
            $sql = 
            "SELECT midtermApprovedByRegistrar 
            FROM approval
            WHERE approvalID = :approvalID";
        } else if ($term == 'final') {
            $sql = 
            "SELECT finalApprovedByRegistrar 
            FROM approval
            WHERE approvalID = :approvalID";
        }
        
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
        "SELECT student.studentID, student.studentFName, student.studentMName, student.studentLName, grade.gradeMidterm, grade.gradeFinal, grade.gradeFeedback
        FROM student
        LEFT JOIN grade
        ON student.studentID = grade.studentID
        WHERE student.studentSect = :section
        AND (grade.teacherID = :teacher  OR grade.teacherID IS NULL)
        AND (grade.courseCode = :course OR grade.courseCode IS NULL)";

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