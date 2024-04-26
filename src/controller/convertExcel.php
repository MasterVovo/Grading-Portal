<?php
// API for converting excel into json

require_once '../model/ExcelReader.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // TODO: Verify if the file is indeed an ecr
    
    $excelReader = new ExcelReader($_FILES['excel']['tmp_name']);

    if ($_POST['method'] == 'faculty') {
        echo json_encode($excelReader->getFacultyData());
    }

    // $idsAndGrades;
    // $ecrReader = new ECRReader($_FILES['ecr']['tmp_name']);
    // if ($_POST['grdTerm'] == 'midterm') {
    //     $idsAndGrades = $ecrReader->getMidterm($_POST['idStartCell'], $_POST['idEndCell'], $_POST['grdStartCell'], $_POST['grdEndCell']);

    //     $gradeUploader = new GradeUploader($idsAndGrades, 0, $ecrReader.getCrsId());
    //     $gradeUploader.uploadToMidterm();
    // }
    // else if ($_POST['grdTerm'] == 'final') {
    //     $idsAndGrades = $ecrReader->getFinal($_POST['idStartCell'], $_POST['idEndCell'], $_POST['grdStartCell'], $_POST['grdEndCell']);

    //     $gradeUploader = new GradeUploader($idsAndGrades, 0, $ecrReader.getCrsId());
    // }

    // foreach($idsAndGrades as $idAndGrade) {
    //     foreach($idAndGrade as $data) {
    //         echo $data . " ";
    //     }
    //     echo "<br>";
    // }

} else {
    echo 'PHP else';
    exit();
}