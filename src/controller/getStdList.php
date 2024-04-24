<?php
// API for fetching the student list

require_once '../model/StudentFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stdFetcher = new StudentFetcher();
    if ($_POST['method'] == 'getAllStd')
        echo $stdFetcher->getAllStd();
    else if ($_POST['method'] == 'getStdBySct')
        echo $stdFetcher->getStdBySct($_POST['section']);
} else {
    exit();
}