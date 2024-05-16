<?php
// API for update semester date

require_once '../model/SemesterUpdater.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $semUpdtr = new SemesterUpdater($_POST['semName'], $_POST['startDate'], $_POST['endDate']);
    echo json_encode($semUpdtr->uploadToDB());
} else {
    exit();
}