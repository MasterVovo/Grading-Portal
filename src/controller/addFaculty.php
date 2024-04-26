<?php
// API for adding faculty

require_once '../model/FacultyAdder.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fctUpldr = new FacultyAdder();

    switch($_POST['method']) {
        case 'addSingle':
            echo $fctUpldr->uploadToDB($_POST['fctID'], $_POST['fname'], $_POST['mname'], $_POST['lname'], $_POST['email'], $_POST['pass'], $_POST['fctType']);
            break;
        case 'addBulk':
            echo $fctUpldr->uploadBulkFct(json_decode($_POST['bulkData']));
            break;
    };
    
    // $fctID = $_POST['fctID'];
    // $fname = $_POST['fname'];
    // $mname = $_POST['mname'];
    // $lname = $_POST['lname'];
    // $email = $_POST['email'];
    // $pass = $_POST['pass'];
    // $fctType = $_POST['fctType'];
    
    
    
} else {
    exit();
}