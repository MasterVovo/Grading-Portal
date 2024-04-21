<?php
// API for fetching the section list

require_once '../model/SectionFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $method = $_POST['method'];
    if (isset($_POST['year'])) {
        $method = $_POST['method'];
        $year = $_POST['year'];
    }
    
    $sctFetcher = new SectionFetcher();
    if ($method == 'getSectionsByYear')
        echo $sctFetcher->getSctByYear($year);
    else if ($method == 'getAllSctId')
        echo $sctFetcher->getAllSctId();
    else if ($method == 'getAllSct')
        echo $sctFetcher->getAllSct();
    // echo $fctFetcher->uploadToDB();
} else {
    exit();
}