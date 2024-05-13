<?php
session_start();
require_once("DB_Conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the request and fetch courses based on the semester and year
    $semester = $_POST['semester'];
    $year = $_POST['year'];

    // Adjust your SQL query to fetch courses based on the selected semester and year
    $sql = 
    "SELECT grade.courseCode, course.courseName, faculty.facultyFName, faculty.facultyMName, faculty.facultyLName, grade.gradeMidterm, grade.gradeFinal, grade.gradeFeedback
    FROM grade
    LEFT JOIN faculty
    ON faculty.facultyID = grade.teacherID
    RIGHT JOIN course
    ON course.courseCode = grade.courseCode
    WHERE course.courseSem = ?
    AND course.courseYear = ?
    AND (grade.studentID IS NULL
    OR grade.studentID = ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $semester, $year, $_SESSION['userID']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['courseCode'] . "</td>";
        echo "<td>" . $row['courseName'] . "</td>";
        echo "<td>" . $row['facultyFName'] . " "  . $row['facultyMName'] . " "  . $row['facultyLName'] . "</td>";
        echo "<td>" . $row['gradeMidterm'] . "</td>";
        echo "<td>" . $row['gradeFinal'] . "</td>";
        echo "<td>" . $row['gradeFeedback'] . "</td>";
        echo "</tr>";
    }
}
?>