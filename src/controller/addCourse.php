<?php
// API for adding course

require_once '../model/CourseAdder.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crsCode = $_POST['crsCode'];
    $crsName = $_POST['crsName'];
    $dept = $_POST['dept'];
    $year = $_POST['year'];
    $sem = $_POST['sem'];
    
    $crsUpldr = new CourseAdder($crsCode, $crsName, $dept, $year, $sem);
    echo $crsUpldr->uploadToDB();
} else {
    exit();
}