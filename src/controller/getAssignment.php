<?php
// API for fetching the assignment of faculty on section and course

require_once '../model/AssignmentFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $assFetcher = new AssignmentFetcher();
    if ($_POST['method'] == 'getAssignmentByFct')
        echo $assFetcher->getAssnByFct($_POST['facultyID']);
} else {
    exit();
}