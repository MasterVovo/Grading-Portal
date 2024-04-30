<?php
require_once "DB_Conn.php";

if (isset($_POST['studentID'])) {
    $studentID = $_POST['studentID'];

    // Change user status to 'Archived'
    $archiveQuery = "UPDATE student SET studentStatus=3 WHERE studentID = ?";
    $stmt = mysqli_prepare($conn, $archiveQuery);
    mysqli_stmt_bind_param($stmt, "s", $studentID);
    mysqli_stmt_execute($stmt);

    echo "User Archived Successfully";
} else {
    echo "User Archiving Failed";
}
