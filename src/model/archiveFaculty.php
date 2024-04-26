<?php
require_once "DB_Conn.php";

if (isset($_POST['facultyID'])) {
    $facultyID = $_POST['facultyID'];

    // Change user status to 'Archived'
    $archiveQuery = "UPDATE faculty SET facultyStatus=3 WHERE facultyID = ?";
    $stmt = mysqli_prepare($conn, $archiveQuery);
    mysqli_stmt_bind_param($stmt, "s", $facultyID);
    mysqli_stmt_execute($stmt);

    echo "User Archived Successfully";
} else {
    echo "User Archiving Failed";
}
