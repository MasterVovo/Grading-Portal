<?php
// Include database connection
require_once 'DB_Conn.php';

// SQL query to fetch data from faculty table
$sql = "SELECT * FROM faculty";
$result = mysqli_query($conn, $sql);

// Check if query was successful
if ($result) {
    // Array to hold faculty data
    $facultyData = array();

    // Fetch data as associative array
    while ($row = mysqli_fetch_assoc($result)) {
        $facultyData[] = $row;
    }

    // Return JSON response
    echo json_encode($facultyData);
} else {
    // Return error message if query fails
    echo json_encode(array('error' => 'Failed to fetch data from database'));
}
