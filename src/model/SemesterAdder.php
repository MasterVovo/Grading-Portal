<?php
// A class for uploading new semester

require_once 'DBConn.php';

class SemesterAdder {
    private $semName, $startDate, $endDate;

    public function __construct($semName, $startDate, $endDate) {
        $this->semName = $semName;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function uploadToDB() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "INSERT INTO semester(semesterID, startDate, endDate) VALUES (:semID, :start, :end)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':semID' => $this->semName,
            ':start' => $this->startDate,
            ':end' => $this->endDate
        ]);

        if ($result)
            return "Query executed successfully.";
        else
            return $conn->errorInfo();
    }
}