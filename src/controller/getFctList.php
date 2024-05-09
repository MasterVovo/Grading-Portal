<?php
// API for fetching the teacher list

require_once '../model/FacultyFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fctFetcher = new FacultyFetcher();
    switch($_POST['method']) {
        case 'getAllFct':
            echo $fctFetcher->getAllFct();
            break;
        case 'getFct':
            echo $fctFetcher->getFct($_POST['facultyID']);
            break;
        case 'countFct':
            echo $fctFetcher->countFct();
            break;
        case 'getAssignedFct':
            echo json_encode($fctFetcher->getAssignedFct($_POST['section'], $_POST['course']));
            break;
        case 'getBySpecialization':
            echo json_encode($fctFetcher->getBySpecialization($_POST['course']));
            break;
    }

} else {
    exit();
}