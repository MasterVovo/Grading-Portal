<?php
// API for adding semester

require_once '../model/SemesterAdder.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $semUpldr = new SemesterAdder($_POST['semName'], $_POST['startDate'], $_POST['endDate']);
    echo $semUpldr->uploadToDB();
} else {
    exit();
}