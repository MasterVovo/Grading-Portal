<?php
// A class for uploading new section

require_once 'DBConn.php';

class SectionAdder {
    private $sctID, $dept, $fctID, $year;

    public function __construct($sctID, $dept, $fctID, $year) {
        $this->sctID = $sctID;
        $this->dept = $dept;
        $this->fctID = $fctID;
        $this->year = $year;
    }

    public function teacherExist() {
        return true;
    }

    public function uploadToDB() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "INSERT INTO section(sectionID, sectionDept, sectionAdv, sectionYearLvl) VALUES (:sctID, :dept, :fctID, :year)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':sctID' => $this->sctID,
            ':dept' => $this->dept,
            ':fctID' => $this->fctID,
            ':year' => $this->year
        ]);

        if ($result)
            echo "Query executed successfully.";
        else
            echo $conn->errorInfo();
    }
}