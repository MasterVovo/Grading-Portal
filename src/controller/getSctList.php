<?php
// API for fetching the section list

session_start();
require_once '../model/SectionFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sctFetcher = new SectionFetcher();

    switch($_POST['method']) {
        case 'getAllSct':
            echo $sctFetcher->getAllSct();
            break;
        case 'getAllSctId':
            echo $sctFetcher->getAllSctId();
            break;
        case 'getSectionsByYear':
            echo $sctFetcher->getSctByYear($_POST['year']);
            break;
        case 'getSctByFct':
            echo $sctFetcher->getSctByFct($_SESSION['userID']);
            break;
    }
} else {
    exit();
}