<?php
include "../model/dbConn.php";

class UpdateSubject {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function updateSubject($courseID, $newCourseCode, $newCourseTitle) {
        // Get database connection
        $conn = $this->db->getConnection();

        // Prepare and execute SQL statement to update subject
        $query = "UPDATE crstable SET crsCode = ?, crsTitle = ? WHERE crsID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $newCourseCode, $newCourseTitle, $courseID);

        if ($stmt->execute()) {
            // Subject updated successfully
            $response = array('message' => 'Subject updated successfully');
        } else {
            // Error updating subject
            $response = array('error' => 'Error updating subject: ' . $stmt->error);
        }

        // Close statement and database connection
        $stmt->close();
        $conn->close();

        return $response;
    }
}

// Check if POST data is received
if(isset($_POST['crsID']) && isset($_POST['crsCode']) && isset($_POST['crsTitle'])) {
    // Retrieve POST data
    $courseID = $_POST['crsID'];
    $newCourseCode = $_POST['crsCode'];
    $newCourseTitle = $_POST['crsTitle'];

    // Create a new Database instance
    $db = new Database($servername, $username, $password, $dbname);

    // Create a new UpdateSubject instance
    $updateSubject = new UpdateSubject($db);

    // Update subject
    $response = $updateSubject->updateSubject($courseID, $newCourseCode, $newCourseTitle);

    // Return response as JSON
    echo json_encode($response);
} else {
    // Invalid request
    echo json_encode(array('error' => 'Invalid request'));
}
?>
