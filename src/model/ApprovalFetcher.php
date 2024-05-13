<?php
// A class for retrieving approval data

require_once 'DBConn.php';

class ApprovalFetcher {
    public function __construct() {

    }

    public function get($id) {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = 
        "SELECT * 
        FROM approval 
        WHERE approvalID = :id";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':id' => $id
        ]);

        if ($result)
            return $stmt->fetch();
        else
            return $conn->errorInfo();
    }

    public function getToBeApprovedByChair() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = 
        "SELECT * 
        FROM approval 
        WHERE isApprovedByChair = 0";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return $conn->errorInfo();
    }

    public function getToBeApprovedByDean() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = 
        "SELECT * 
        FROM approval 
        WHERE isApprovedByDean = 0";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return $conn->errorInfo();
    }

    public function getToBeApprovedByRegistrar() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = 
        "SELECT * 
        FROM approval 
        WHERE isApprovedByRegistrar = 0";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return $conn->errorInfo();
    }
}