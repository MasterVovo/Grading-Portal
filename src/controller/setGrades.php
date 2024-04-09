<?php
// API for uploading the grades on database via copy pasting from excel

require_once '../model/Grades.php';
require_once '../model/GradeUploader.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $grades = new Grades($_POST['id'], $_POST['grd']);
    $assocIdGrd = $grades->getGradesByID();

    $grdUploader = new GradeUploader($assocIdGrd, 0, $_POST['crsID']);

    if ($_POST['grdTerm'] === 'midterm') {
        $grdUploader->uploadToMidterm();
    }
} else {
    exit();
}