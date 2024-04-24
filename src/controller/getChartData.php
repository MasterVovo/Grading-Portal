<?php
// API for fetching the chart data

require_once '../model/ChartFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $method = $_POST['method'];

    $chartFetcher = new ChartFetcher();

    if ($method == 'getActiveUsers')
        echo $chartFetcher->getActiveUsers();
    else if ($method == 'getTotalStudent')
        echo $chartFetcher->getTotalStudent();
    else if ($method == 'getTotalFaculty')
        echo $chartFetcher->getTotalFaculty();

} else {
    exit();
}