<?php
require_once '../model/ECRReader.php';

if (isset($_FILES['ecr'])) {
    // TODO: Verify if the file is indeed an ecr
    
    $ecrReader = new ECRReader($_FILES['ecr']['tmp_name']);
    $dataArray = $ecrReader->getMidterm($_POST['startCell'], $_POST['endCell']);

    foreach($dataArray as $row) {
        foreach($row as $column) {
            echo $column . " ";
        }
        echo "<br>";
    }

} else {
    echo 'PHP else';
    exit();
}