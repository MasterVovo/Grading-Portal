<?php
// API for uploading the grades on database

session_start();
require_once '../model/Grades.php';
require_once '../model/GradeUploader.php';
require_once '../model/GradeFetcher.php';
require_once '../model/CourseFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['term'] === 'midterm') {
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

            $res = $grdUploader->uploadToMidterm($gradeID, $gradeFeedback['grade'], $gradeFeedback['feedback']);

            if ($res !== 'Query executed successfully.') {
                echo 'Student ' . $id . 'and further aren\'t uploaded';
                die($res);
            }
        }
        echo json_encode('Success');  
    } else if ($_POST['term'] === 'final') {
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

            $res = $grdUploader->uploadToFinal($gradeID, $gradeFeedback['grade'], $gradeFeedback['feedback']);

            if ($res !== 'Query executed successfully.') {
                echo 'Student ' . $id . 'and further aren\'t uploaded';
                die($res);
            }
        }
        echo json_encode('Success');
    }
} else {
    exit();
}

