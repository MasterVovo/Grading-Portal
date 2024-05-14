<?php
session_start();
require_once("DB_Conn.php");

header('Content-Type: application/json');

$response = array();

if(isset($_SESSION['userID'])){
    $sql = "SELECT facultyFName FROM faculty WHERE facultyID = ? UNION ALL SELECT studentFName FROM student WHERE studentID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $_SESSION['userID'], $_SESSION['userID']);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $response['facultyName'] = "Hello " . $row['facultyFName'];
    } else {
        $response['error'] = "Faculty Not Found";
    }
} else {
    $response['error'] = "Not Logged In";
}

echo json_encode($response);
?>
