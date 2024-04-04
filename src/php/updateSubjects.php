<?php
include "../model/dbConn.php";

// Check if POST data is received
if(isset($_POST['crsID']) && isset($_POST['crsCode']) && isset($_POST['crsTitle'])) {
    // Retrieve POST data
    $courseID = $_POST['crsID'];
    $newCourseCode = $_POST['crsCode'];
    $newCourseTitle = $_POST['crsTitle'];

    // Create a new Database instance
    $db = new Database($servername, $username, $password, $dbname);

    // Get database connection
    $conn = $db->getConnection();

    // Prepare and execute SQL statement to update subject
    $query = "UPDATE crstable SET crsCode = ?, crsTitle = ? WHERE crsID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $newCourseCode, $newCourseTitle, $courseID);

    if ($stmt->execute()) {
        // Subject updated successfully
        echo json_encode(array('message' => 'Subject updated successfully'));
    } else {
        // Error updating subject
        echo json_encode(array('error' => 'Error updating subject: ' . $stmt->error));
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Invalid request
    echo json_encode(array('error' => 'Invalid request'));
}
?>
