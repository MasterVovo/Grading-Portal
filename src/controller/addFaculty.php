<?php
// API for adding faculty

require_once '../model/FacultyAdder.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fctID = $_POST['fctID'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    $fctUpldr = new FacultyAdder($fctID, $fname, $mname, $lname, $email, $pass);
    echo $fctUpldr->uploadToDB();
} else {
    exit();
}