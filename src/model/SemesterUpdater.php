<?php
// A class for uploading new semester

require_once 'DBConn.php';

class SemesterUpdater {
    private $semName, $startDate, $endDate;

    public function __construct($semName, $startDate, $endDate) {
        $this->semName = $semName;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function uploadToDB() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = 
        "UPDATE semester SET startDate = :start, endDate = :end 
        WHERE semesterName = :semName;";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':semName' => $this->semName,
            ':start' => $this->startDate,
            ':end' => $this->endDate
        ]);

        if ($result)
            return "Success";
        else
            return $conn->errorInfo();
    }
}