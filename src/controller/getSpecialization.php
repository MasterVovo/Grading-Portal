<?php
// API for fetching the subject assignment of teachers

require_once '../model/CourseFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crsFetcher = new CourseFetcher();
    echo json_encode($crsFetcher->getCrsByFct($_POST['facultyID']));
} else {
    exit();
}