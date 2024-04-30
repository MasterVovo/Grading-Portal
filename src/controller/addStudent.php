<?php
// API for adding students

require_once '../model/StudentAdder.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stdUpldr = new StudentAdder();

    switch($_POST['method']) {
        case 'addSingle':
            echo $stdUpldr->uploadToDB($_POST['stdID'], $_POST['fname'], $_POST['mname'], $_POST['lname'], $_POST['email'], $_POST['pass'], $_POST['year'], $_POST['sect']);
            break;
        case 'addBulk':
            echo $stdUpldr->uploadBulkStd(json_decode($_POST['bulkData']));
            break;
    };
    
    // $stdID = $_POST['stdID'];
    // $fname = $_POST['fname'];
    // $mname = $_POST['mname'];
    // $lname = $_POST['lname'];
    // $email = $_POST['email'];
    // $pass = $_POST['pass'];
    // $year = $_POST['year'];
    // $sect = $_POST['sect'];
    
    // $stdUpldr = new StudentAdder($stdID, $fname, $mname, $lname, $email, $pass, $year, $sect);
    // echo $stdUpldr->uploadToDB();
} else {
    exit();
}