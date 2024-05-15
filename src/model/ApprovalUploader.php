<?php
// A class for setting approval data

require_once 'DBConn.php';

class ApprovalUploader {
    public function __construct() {

    }

    public function approveChair($id, $term) {
        $conn = DBConn::getInstance()->getConnection();

        if ($term == 'midterm') {
            $sql = 
            "UPDATE approval 
            SET midtermApprovedByChair = 1 
            WHERE approvalID = :id";
    
        } else if ($term == 'final') {
            $sql = 
            "UPDATE approval 
            SET finalApprovedByChair = 1 
            WHERE approvalID = :id";
        }

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':id' => $id
        ]);

        if ($result) {
            if ($stmt->rowCount())
                return 'Success';
            else
                return 'No row affected';
        }
        else
            return $conn->errorInfo();
    }

    public function approveDean($id, $term) {
        $conn = DBConn::getInstance()->getConnection();
        
        if ($term == 'midterm') {
            $sql = 
            "UPDATE approval 
            SET midtermApprovedByDean = 1 
            WHERE approvalID = :id";
    
        } else if ($term == 'final') {
            $sql = 
            "UPDATE approval 
            SET finalApprovedByDean = 1 
            WHERE approvalID = :id";
        }

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':id' => $id
        ]);

        if ($result) {
            if ($stmt->rowCount())
                return 'Success';
            else
                return 'No row affected';
        }
        else
            return $conn->errorInfo();
    }

    public function approveRegistrar($id, $term) {
        $conn = DBConn::getInstance()->getConnection();
        
        if ($term == 'midterm') {
            $sql = 
            "UPDATE approval 
            SET midtermApprovedByRegistrar = 1 
            WHERE approvalID = :id";
    
        } else if ($term == 'final') {
            $sql = 
            "UPDATE approval 
            SET finalApprovedByRegistrar = 1 
            WHERE approvalID = :id";
        }

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':id' => $id
        ]);

        if ($result) {
            if ($stmt->rowCount())
                return 'Success';
            else
                return 'No row affected';
        }
        else
            return $conn->errorInfo();
    }

    public function availMidtermForApproval($approvalID) {
        $conn = DBConn::getInstance()->getConnection();

        $sql = 
        "UPDATE approval 
        SET midtermApprovedByChair = 0, midtermApprovedByDean = 0, midtermApprovedByRegistrar = 0
        WHERE approvalID = :approvalID";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':approvalID' => $approvalID
        ]);

        if ($result) {
            return 'Success';
        } else
            $conn->errorInfo();
    }
    
    public function availFinalForApproval($approvalID) {
        $conn = DBConn::getInstance()->getConnection();

        $sql = 
        "UPDATE approval 
        SET finalApprovedByChair = 0, finalApprovedByDean = 0, finalApprovedByRegistrar = 0
        WHERE approvalID = :approvalID";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':approvalID' => $approvalID
        ]);

        if ($result) {
            return 'Success';
        } else
            $conn->errorInfo();
    }
}