<?php
require_once '../model/ECRReader.php';
require_once '../model/GradeUploader.php';

if (isset($_FILES['ecr'])) {
    // TODO: Verify if the file is indeed an ecr
    
    $idsAndGrades;
    $ecrReader = new ECRReader($_FILES['ecr']['tmp_name']);
    if ($_POST['grdTerm'] == 'midterm') {
        $idsAndGrades = $ecrReader->getMidterm($_POST['idStartCell'], $_POST['idEndCell'], $_POST['grdStartCell'], $_POST['grdEndCell']);

        $gradeUploader = new GradeUploader($idsAndGrades, 0, $ecrReader.getCrsId());
        $gradeUploader.uploadToMidterm();
    }
    else if ($_POST['grdTerm'] == 'final') {
        $idsAndGrades = $ecrReader->getFinal($_POST['idStartCell'], $_POST['idEndCell'], $_POST['grdStartCell'], $_POST['grdEndCell']);

        $gradeUploader = new GradeUploader($idsAndGrades, 0, $ecrReader.getCrsId());
    }

    foreach($idsAndGrades as $idAndGrade) {
        foreach($idAndGrade as $data) {
            echo $data . " ";
        }
        echo "<br>";
    }

} else {
    echo 'PHP else';
    exit();
}