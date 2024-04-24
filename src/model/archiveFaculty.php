<?php
require_once "DB_Conn.php";

if (isset($_POST['facultyID'])) {
    $facultyID = $_POST['facultyID'];

    // Move to archives table
    $insertQuery = "INSERT INTO archivefaculty SELECT * FROM faculty WHERE facultyID = ?";
    $stmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($stmt, "s", $facultyID);
    mysqli_stmt_execute($stmt);

    // Delete from main table
    $deleteQuery = "DELETE FROM faculty WHERE facultyID = ?";
    $stmt = mysqli_prepare($conn, $deleteQuery);
    mysqli_stmt_bind_param($stmt, "s", $facultyID);
    mysqli_stmt_execute($stmt);

    echo "User Archived Successfully";
} else {
    echo "User Archiving Failed";
}
