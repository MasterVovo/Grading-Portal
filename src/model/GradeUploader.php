<?php

require_once 'DBConn.php';

class GradeUploader {
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

        foreach ($this->idsAndGrades as $id => $grd) {
            $stmt->execute([
                ':stdID' => $id,
                ':thrID' => $this->thrID,
                ':crsID' => $this->crsID,
                ':grdMidTerm' => $grd
            ]);
        }
    }
}