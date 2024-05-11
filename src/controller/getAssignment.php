<?php
// API for fetching the assignment of faculty on section and course

session_start();
require_once '../model/AssignmentFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $assFetcher = new AssignmentFetcher();
    switch($_POST['method']) {
        case 'getAssignmentByFct':
            echo $assFetcher->getAssnByFct($_POST['facultyID']);
            break;
        case 'getBySctAndFct':
            echo json_encode($assFetcher->getByFctAndSct($_SESSION['userID'], $_POST['section']));
            break;
    }
} else {
    exit();
}