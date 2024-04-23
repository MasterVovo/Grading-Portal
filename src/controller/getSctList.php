<?php
// API for fetching the section list

require_once '../model/SectionFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sctFetcher = new SectionFetcher();
    if ($_POST['method'] == 'getAllSct')
        echo $sctFetcher->getAllSct();
    else if ($_POST['method'] == 'getAllSctId')
        echo $sctFetcher->getAllSctId();
    else if ($_POST['method'] == 'getSectionsByYear')
        echo $sctFetcher->getSctByYear($_POST['year']);

    // echo $fctFetcher->uploadToDB();
} else {
    exit();
}