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

    $stdUpldr = new StudentAdder($id, $fname, $mname, $lname, $email, $pass);
} else {
    exit();
}