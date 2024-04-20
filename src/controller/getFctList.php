<?php
// API for fetching the teacher list

require_once '../model/FacultyFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fctFetcher = new FacultyFetcher();
    echo $fctFetcher->getAllFct();
    // echo $fctFetcher->uploadToDB();
} else {
    exit();
}