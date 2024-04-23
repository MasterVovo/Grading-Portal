<?php
// API for fetching the student list

session_start();
require_once '../model/StudentFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $_SESSION['userID'];
    echo 'Hello world';
    $stdFetcher = new StudentFetcher();
    if ($_POST['method'] == 'getAllStd')
        echo $stdFetcher->getAllStd();
    else if ($_POST['method'] == 'getStdBySessionID')
        echo $stdFetcher->getStdBySessionID($_SESSION['userID']);
} else {
    exit();
}