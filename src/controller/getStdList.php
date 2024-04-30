<?php
// API for fetching the student list

require_once '../model/StudentFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stdFetcher = new StudentFetcher();

    switch($_POST['method']) {
        case 'getAllStd':
            echo $stdFetcher->getAllStd();
            break;
        case 'getStdBySct':
            echo $stdFetcher->getStdBySct($_POST['section']);
            break;
        case 'countStd':
            echo $stdFetcher->countStd();
            break;
    }
} else {
    exit();
}