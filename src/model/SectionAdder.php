<?php
// A class for uploading new section

require_once 'DBConn.php';

class SectionAdder {
    private $sctID, $fctID, $year;

    public function __construct($sctID, $fctID, $year) {
        $this->sctID = $sctID;
        $this->fctID = $fctID;
        $this->year = $year;
    }

    public function teacherExist() {
        return true;
    }

    public function uploadToDB() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "INSERT INTO section(sectionID, sectionAdv, sectionYearLvl) VALUES (:sctID, :fctID, :year)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':sctID' => $this->sctID,
            ':fctID' => $this->fctID,
            ':year' => $this->year
        ]);

        if ($result)
            echo "Query executed successfully.";
        else
            echo $conn->errorInfo();
    }
}