<?php
// API for getting the teacher type

session_start();
require_once '../model/FacultyFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fctFetcher = new FacultyFetcher();
    echo $fctFetcher->getFctType($_SESSION['userID']);
    
    // switch($_POST['method']) {
    //     case 'getAllSct':
    //         echo $sctFetcher->getAllSct();
    //         break;
    //     case 'getAllSctId':
    //         echo $sctFetcher->getAllSctId();
    //         break;
    //     case 'getSectionsByYear':
    //         echo $sctFetcher->getSctByYear($_POST['year']);
    //         break;
    //     case 'getSctByFct':
    //         echo $sctFetcher->getSctByFct($_SESSION['userID']);
    //         break;
    // }
} else {
    exit();
}