<?php
// API for fetching the teacher list

require_once '../model/ArchiveFacultyFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fctFetcher = new FacultyFetcher();
    if ($_POST['method'] == 'getAllFct')
        echo $fctFetcher->getAllFct();
    else if ($_POST['method'] == 'getFct')
        echo $fctFetcher->getFct($_POST['facultyID']);
    // echo $fctFetcher->uploadToDB();
} else {
    exit();
}