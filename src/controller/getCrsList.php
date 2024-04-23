<?php
// API for fetching the course list

require_once '../model/CourseFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $method = $_POST['method'];

    $crsFetcher = new CourseFetcher();

    if ($method == 'getAllCrs')
        echo $crsFetcher->getAllCrs();
    else if ($method == 'getAllCrsId')
        echo $crsFetcher->getAllCrsId();
    // echo $fctFetcher->uploadToDB();
} else {
    exit();
}