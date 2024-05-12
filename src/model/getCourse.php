<?php
require_once("DB_Conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the request and fetch courses based on the semester and year
    $semester = $_POST['semester'];
    $year = $_POST['year'];

    // Adjust your SQL query to fetch courses based on the selected semester and year
    $sql = "SELECT courseCode, courseName FROM course WHERE courseSem = ? AND courseYear = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $semester, $year);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['courseCode'] . "</td>";
        echo "<td>" . $row['courseName'] . "</td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "</td>";
    }
}
?>