<?php
include "dbConn.php";

$students = [];

$query = "SELECT * FROM stdtable";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Add each student as an array to the $students array
        $students[] = $row;
    }

    // Close the database connection
    mysqli_close($conn);

    // Set the response header to JSON
    header('Content-Type: application/json');

    // Encode the $students array as JSON and send it back
    echo json_encode($students);
} else {
    // Handle errors if the query fails
    echo "Error fetching student data from the database";
}
?>