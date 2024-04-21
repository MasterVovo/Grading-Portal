<?php
// API for adding students

require_once '../model/StudentAdder.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stdID = $_POST['stdID'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $year = $_POST['year'];
    $sect = $_POST['sect'];
    
    $stdUpldr = new StudentAdder($stdID, $fname, $mname, $lname, $email, $pass, $year, $sect);
    echo $stdUpldr->uploadToDB();
} else {
    exit();
}