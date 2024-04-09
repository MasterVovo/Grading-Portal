<?php

require_once 'DBConn.php';

class GradeUploader extends DBConn {
    private $idsAndGrades, $thrID, $crsID;
    public function __construct($idsAndGrades, $thrID, $crsID) {
        $this->idsAndGrades = $idsAndGrades;
        $this->thrID = $thrID;
        $this->crsID = $crsID;
    }

    public function uploadToMidterm() {
        $conn = DBConn::getInstance()->getConnection();

        $sql = "INSERT INTO grdtable(stdID, thrID, crsID, grdMidTerm) VALUES (:stdID, :thrID, :crsID, :grdMidTerm)";
        $stmt = $conn->prepare($sql);

        foreach ($this->idsAndGrades as $idAndGrade) {
            $stmt->execute([
                ':stdID' => $idAndGrade[0],
                ':thrID' => $this->thrID,
                ':crsID' => $this->crsID,
                ':grdMidTerm' => $idAndGrade[1]
            ]);
        }
    }
}