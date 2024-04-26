<?php
// API for fetching the teacher list

require_once '../model/FacultyFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fctFetcher = new FacultyFetcher();
    if ($_POST['method'] == 'getAllFct')
        echo $fctFetcher->getAllFct();
    else if ($_POST['method'] == 'getFct')
        echo $fctFetcher->getFct($_POST['facultyID']);
    else if ($_POST['method'] == 'countFct')
        echo $fctFetcher->countFct();
} else {
    exit();
}