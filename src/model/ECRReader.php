<?php
require_once '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

class ECRReader {
    private $spreadsheet;
    private $crsIdCol = 'D11';

    public function __construct($xlsPath) {
        $this->spreadsheet = IOFactory::load($xlsPath);
    }

    public function getMidterm($idStartCell, $idEndCell, $grdStartCell, $grdEndCell) {
        return $this->getCells($this->spreadsheet->getSheetByName('MIDTERM GRADE SHEET'), $idStartCell, $idEndCell);
        // $ids = $this->getCells($this->spreadsheet->getSheetByName('MIDTERM GRADE SHEET'), $idStartCell, $idEndCell);
        // $grades = $this->getCells($this->spreadsheet->getSheetByName('MIDTERM GRADE SHEET'), $grdStartCell, $grdEndCell);

        // $combinedIdGrade = array_map(function($a, $b) { return [$a[0], $b[0]]; }, $ids, $grades);
        // return $combinedIdGrade;
    }

    public function getFinal($idStartCell, $idEndCell, $grdStartCell, $grdEndCell) {
        return $this->getCells($this->spreadsheet->getSheetByName('FINAL GRADE SHEET'), $startCell, $endCell);
    }

    private function getCells($sheet, $startCell, $endCell) {
        // Get all the data inside the start and end cells
        return $dataArray = $sheet->rangeToArray(
            $startCell . ':' . $endCell, 
            NULL, 
            TRUE, 
            TRUE, 
            FALSE
        );
    }
}