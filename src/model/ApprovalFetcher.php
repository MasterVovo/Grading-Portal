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

    public function getToBeApprovedByChair($term) {
        $conn = DBConn::getInstance()->getConnection();
        
        if ($term == 'midterm') {
            $sql = 
            "SELECT * 
            FROM approval 
            WHERE midtermApprovedByChair = 0";
        } else if ($term == 'final') {
            $sql = 
            "SELECT * 
            FROM approval 
            WHERE finalApprovedByChair = 0";
        }
        
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return $conn->errorInfo();
    }

    public function getToBeApprovedByDean($term) {
        $conn = DBConn::getInstance()->getConnection();

        if ($term == 'midterm') {
            $sql = 
            "SELECT * 
            FROM approval 
            WHERE midtermApprovedByChair = 1
            AND midtermApprovedByDean = 0";
        } else if ($term == 'final') {
            $sql = 
            "SELECT * 
            FROM approval 
            WHERE finalApprovedByChair = 1
            AND finalApprovedByDean = 0";
        }

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return $conn->errorInfo();
    }

    public function getToBeApprovedByRegistrar($term) {
        $conn = DBConn::getInstance()->getConnection();

        if ($term == 'midterm') {
            $sql = 
            "SELECT * 
            FROM approval 
            WHERE midtermApprovedByChair = 1
            AND midtermApprovedByDean = 1
            AND midtermApprovedByRegistrar = 0";
        } else if ($term == 'final') {
            $sql = 
            "SELECT * 
            FROM approval 
            WHERE finalApprovedByChair = 1
            AND finalApprovedByDean = 1
            AND finalApprovedByRegistrar = 0";
        }

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return $conn->errorInfo();
    }

    public function getApprovedByRegistrar($term) {
        $conn = DBConn::getInstance()->getConnection();

        if ($term == 'midterm') {
            $sql = 
            "SELECT * 
            FROM approval 
            WHERE midtermApprovedByRegistrar = 1";
        } else if ($term == 'final') {
            $sql = 
            "SELECT * 
            FROM approval 
            WHERE finalApprovedByRegistrar = 1";
        }

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return $conn->errorInfo();
    }
}