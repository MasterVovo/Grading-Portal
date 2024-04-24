<?php
// API for fetching the section list

session_start();
require_once '../model/SectionFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sctFetcher = new SectionFetcher();
    if ($_POST['method'] == 'getAllSct')
        echo $sctFetcher->getAllSct();
    else if ($_POST['method'] == 'getAllSctId')
        echo $sctFetcher->getAllSctId();
    else if ($_POST['method'] == 'getSectionsByYear')
        echo $sctFetcher->getSctByYear($_POST['year']);
    else if ($_POST['method'] == 'getSctByFct')
        echo $sctFetcher->getSctByFct($_SESSION['userID']);

    // echo $fctFetcher->uploadToDB();
} else {
    exit();
}