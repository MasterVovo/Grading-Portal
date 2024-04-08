<?php
require_once '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

class ECRReader {
    private $spreadsheet;

    public function __construct($xlsPath) {
        $this->spreadsheet = IOFactory::load($xlsPath);
    }

    public function getMidterm($startCell, $endCell) {
        return $this->getCells($this->spreadsheet->getSheetByName('MIDTERM GRADE SHEET'), $startCell, $endCell);
    }

    public function getFinal($startCell, $endCell) {
        return $this->getCells($this->spreadsheet->getSheetByName('FINAL GRADE SHEET'), $startCell, $endCell);
    }

    private function getCells($sheet, $startCell, $endCell) {
        // Get all the data inside the start and end cells
        return $dataArray = $sheet->rangeToArray(
            $startCell . ':' . $endCell, 
            NULL, 
            TRUE, 
            TRUE, 
            TRUE
        );
    }
}