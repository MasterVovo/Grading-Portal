<?php
// A class for reading data on excel

require_once '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelReader {
    private $spreadsheet;
    private $crsIdCol = 'D11';
    private $crsID;

    public function __construct($xlsPath) {
        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $this->spreadsheet = $reader->load($xlsPath);
    }
    
    public function getFacultyData() {
        $worksheet = $this->spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestDataRow();
        $highestColumn = $worksheet->getHighestDataColumn();
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

        $data = array();
        for ($col = 1; $col <= $highestColumnIndex; $col++) {
            // Add the header
            $colVal = $worksheet->getCell([$col, 1])->getValue();
            // array_push($data[], $colVal);
            
            // Loop through rows
            for ($row = 2; $row <= $highestRow; ++$row) {
                $value = $worksheet->getCell([$col, $row])->getValue();
                $data[$colVal][] = $value === null ? "" : $value;
            }
        }

        return $data;
    }

    public function getMidterm($idStartCell, $idEndCell, $grdStartCell, $grdEndCell) {
        // return $this->getCells($this->spreadsheet->getSheetByName('MIDTERM GRADE SHEET'), $idStartCell, $idEndCell);
        $ids = $this->getCells($this->spreadsheet->getSheetByName('MIDTERM GRADE SHEET'), $idStartCell, $idEndCell);
        $grades = $this->getCells($this->spreadsheet->getSheetByName('MIDTERM GRADE SHEET'), $grdStartCell, $grdEndCell);

        $this->crsID = $this->spreadsheet->getSheetByName('MIDTERM GRADE SHEET')->getCell($this->crsIdCol)->getValue();

        $combinedIdGrade = array_map(function($a, $b) { return [$a[0], $b[0]]; }, $ids, $grades);
        return $combinedIdGrade;
    }

    public function getFinal($idStartCell, $idEndCell, $grdStartCell, $grdEndCell) {
        $ids = $this->getCells($this->spreadsheet->getSheetByName('FINAL GRADE SHEET'), $idStartCell, $idEndCell);
        $grades = $this->getCells($this->spreadsheet->getSheetByName('FINAL GRADE SHEET'), $grdStartCell, $grdEndCell);

        $this->crsID = $this->spreadsheet->getSheetByName('FINAL GRADE SHEET')->getCell($this->crsIdCol)->getValue();

        $combinedIdGrade = array_map(function($a, $b) { return [$a[0], $b[0]]; }, $ids, $grades);
        return $combinedIdGrade;
    }

    public function getCrsId() {
        if (isset($this->crsID))
            return $this->crsID;
        return NULL;
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