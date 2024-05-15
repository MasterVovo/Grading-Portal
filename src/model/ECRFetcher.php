<?php
// A class for retrieving approval data

require_once 'DBConn.php';

class ECRFetcher {
    public function __construct() {

    }

    public function get($apprID, $term) {
        $conn = DBConn::getInstance()->getConnection();

        if ($term == 'midterm') {
            $sql = 
            "SELECT student.studentID, student.studentFName, student.studentMName, student.studentLName, student.studentSect, faculty.facultyID, faculty.facultyFName, faculty.facultyMName, faculty.facultyLName, grade.courseCode, grade.gradeMidterm AS grade
            FROM student
            INNER JOIN grade
            ON student.studentID = grade.studentID
            INNER JOIN faculty
            ON faculty.facultyID = grade.teacherID
            WHERE grade.gradeApproved = :apprID
            AND (grade.gradeMidterm <> 0.00 AND grade.gradeMidterm <> 0.00)";
        } else if ($term == 'final') {
            $sql = 
            "SELECT student.studentID, student.studentFName, student.studentMName, student.studentLName, student.studentSect, faculty.facultyID, faculty.facultyFName, faculty.facultyMName, faculty.facultyLName, grade.courseCode, grade.gradeFinal AS grade
            FROM student
            INNER JOIN grade
            ON student.studentID = grade.studentID
            INNER JOIN faculty
            ON faculty.facultyID = grade.teacherID
            WHERE grade.gradeApproved = :apprID
            AND (grade.gradeFinal <> 0.00 AND grade.gradeFinal <> 0.00)";
        }

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':apprID' => $apprID
        ]);

        if ($result)
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return $conn->errorInfo();
    }
}