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
    
    public function getData() {
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

}