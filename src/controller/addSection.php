<?php
// API for adding section

require_once '../model/SectionAdder.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sctID = $_POST['sctID'];
    $fctID = $_POST['fctID'];
    $year = $_POST['year'];
    
    $sctUpldr = new SectionAdder($sctID, $fctID, $year);
    if ($sctUpldr->teacherExist()) {
        echo $sctUpldr->uploadToDB();
    }
} else {
    exit();
}