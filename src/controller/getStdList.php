<?php
// API for fetching the student list

require_once '../model/StudentFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stdFetcher = new StudentFetcher();
    echo $stdFetcher->getAllStd();
    // echo $fctFetcher->uploadToDB();
} else {
    exit();
}