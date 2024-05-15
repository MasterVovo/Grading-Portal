<?php

require_once 'DBConn.php';

class GradeUploader {
    public static $approvalID;
    
    public function __construct() {
        
    }

    public function uploadToMidterm($gradeID, $grade, $feedback, $approvalID) {
        $conn = DBConn::getInstance()->getConnection();
    
        $sql = 
        "UPDATE grade 
        SET gradeMidterm = :grade, gradeFeedback = :feedback
        WHERE gradeID = :gradeID";
        
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':grade' => $grade,
            ':feedback' => $feedback,
            ':gradeID' => $gradeID
        ]);
    
        if ($result) {
            require_once 'ApprovalUploader.php';
            $apprUploader = new ApprovalUploader();
            return $apprUploader->availMidtermForApproval($approvalID);
        } else
            return $conn->errorInfo();
    }

    public function uploadToFinal($gradeID, $grade, $feedback, $approvalID) {
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
            require_once 'ApprovalUploader.php';
            $apprUploader = new ApprovalUploader();
            return $apprUploader->availFinalForApproval($approvalID);
        } else
            return $conn->errorInfo();
    }

    public function createRecord($stdID, $fctID, $crsCode) {
        $conn = DBConn::getInstance()->getConnection();

        if (is_null(GradeUploader::$approvalID)) {
            $sql = "INSERT INTO approval() VALUES ()";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute();
            GradeUploader::$approvalID = $conn->lastInsertID();
        }
        
    
        $sql = "INSERT INTO grade(studentID, teacherID, courseCode, gradeApproved) VALUES (:studentID, :facultyID, :courseCode, :approval)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':studentID' => $stdID,
            ':facultyID' => $fctID,
            ':courseCode' => $crsCode,
            ':approval' => GradeUploader::$approvalID
        ]);
    
        if ($result) {
            return $conn->lastInsertID();
        } else {
            return $conn->errorInfo();
        }
    }
}