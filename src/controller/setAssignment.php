<?php
// API for setting the assignment of faculty to section and courses

require_once '../model/FacultyAssigner.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $facultyID = $_POST['id'];
    $sectionID = $_POST['sect'];
    $courseCode = $_POST['crs'];

    $fctAssgr = new FacultyAssigner($facultyID, $sectionID, $courseCode);
    $fctAssgr->uploadToDB();
} else {
    exit();
}