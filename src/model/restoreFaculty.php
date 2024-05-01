<?php
require_once "DB_Conn.php";

if (isset($_POST['facultyID'])) {
    $facultyID = $_POST['facultyID'];

    $updateQuery = "UPDATE faculty SET facultyType = 2 WHERE facultyID = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, "s", $facultyID);
    mysqli_stmt_execute($stmt);

    echo "Faculty Type Updated Successfully";
} else {
    echo "Failed to update Faculty Type";
}