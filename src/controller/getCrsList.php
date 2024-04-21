<?php
// API for fetching the course list

require_once '../model/CourseFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crsFetcher = new CourseFetcher();
    echo $crsFetcher->getAllCrs();
    // echo $fctFetcher->uploadToDB();
} else {
    exit();
}