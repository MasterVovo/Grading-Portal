<?php
// API for fetching the course list

require_once '../model/CourseFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crsFetcher = new CourseFetcher();

    switch($_POST['method']) {
        case 'getAllCrs':
            echo $crsFetcher->getAllCrs();
            break;
        case 'getAllCrsId':
            echo $crsFetcher->getAllCrsId();
            break;
        case 'getBySection':
            require_once('../model/SectionFetcher.php');
            $sctFetcher = new SectionFetcher();
            $sctData = $sctFetcher->get($_POST['section']);

            require_once('../model/SemesterFetcher.php');
            $semFetcher = new SemesterFetcher();
            $semData = $semFetcher->getCurrentSem(date('Y-m-d'));

            echo json_encode($crsFetcher->getByYearAndSem($sctData['sectionYearLvl'], $semData['semesterID']));
            break;
        default:
            echo 'Method not found';
            break;
    }
} else {
    exit();
}