<?php
// API for adding students

require_once '../model/StudentAdder.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sect = $_POST['sect'];
    $dept = $_POST['dept'];

    $stdUpldr = new StudentAdder($id, $fname, $mname, $lname, $email, $pass, $sect, $dept);
} else {
    exit();
}