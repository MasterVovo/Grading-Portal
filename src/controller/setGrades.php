<?php
// API for uploading the grades on database

session_start();
require_once '../model/Grades.php';
require_once '../model/GradeUploader.php';
require_once '../model/CourseFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $grdUploader = new GradeUploader();

    if ($_POST['grdTerm'] === 'midterm') {
        $crsFetcher = new CourseFetcher();
        $crs = json_decode($crsFetcher->getCrsByFctAndSct($_SESSION['userID'], $_POST['section']));

        echo $grdUploader->uploadToMidterm($_POST['grade'], $_POST['section'], $_POST['`studentID'], $_POST['feedback'], $_SESSION['userID'], $crs[0]->courseCode);
    }
} else {
    exit();
}

