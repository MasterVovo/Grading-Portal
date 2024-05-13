<?php
// A class for setting approval data

require_once 'DBConn.php';

class ApprovalUploader {
    public function __construct() {

    }

    public function approveChair($id) {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = 
        "UPDATE approval 
        SET isApprovedByChair = 1 
        WHERE approvalID = :id";

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
}