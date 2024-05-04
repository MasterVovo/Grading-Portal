<?php
// API for fetching the semester data

session_start();
require_once '../model/SemesterFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $semFetcher = new SemesterFetcher();

    switch($_POST['get']) {
        case 'all':
            echo json_encode($semFetcher->getAll());
            break;
    }
} else {
    exit();
}