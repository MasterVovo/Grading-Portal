<?php
// API for uploading the grades on database

session_start();
require_once '../model/Grades.php';
require_once '../model/GradeUploader.php';
require_once '../model/GradeFetcher.php';
require_once '../model/CourseFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['term'])) {
        $grdUploader = new GradeUploader();
        $grdFetcher = new GradeFetcher();

        $grades = json_decode($_POST['grades'], true);
        
        foreach ($grades as $id => $gradeFeedback) {
            // Make sure that there is an existing grading record
            $gradeID = $grdFetcher->getGradingID($id, $_SESSION['userID'], $_POST['course']);
            if (!$gradeID) {
                $gradeID = $grdUploader->createRecord($id, $_SESSION['userID'], $_POST['course']);
            }
            if (!$gradeID) {
                echo json_encode('Cannot insert new record.');
                exit();
            }

            // Get the approvalID
            if (is_null(GradeUploader::$approvalID)) {
                GradeUploader::$approvalID = $grdFetcher->getApprovalID($gradeID);
            }

            // Upload the grades
            if ($_POST['term'] == 'midterm') {
                $res = $grdUploader->uploadToMidterm($gradeID, $gradeFeedback['grade'], $gradeFeedback['feedback'], GradeUploader::$approvalID);
            } else if ($_POST['term'] == 'final') {
                $res = $grdUploader->uploadToFinal($gradeID, $gradeFeedback['grade'], $gradeFeedback['feedback'], GradeUploader::$approvalID);
            }

            if ($res !== 'Success') {
                echo 'Student ' . $id . ' and further aren\'t uploaded';
                die($res);
            }
        }
        echo json_encode('Success');
    }
} else {
    exit();
}

