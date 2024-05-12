<?php
// API for setting the courses that teachers taught

session_start();
require_once '../model/GradeFetcher.php';
require_once '../model/StudentFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    switch ($_POST['method']) {
        case 'gradeStatus':
            $stdFetcher = new StudentFetcher();
            $students = json_decode($stdFetcher->getStdBySct($_POST['section']), true);
            $stdID = $students[0]['studentID'];

            $grdFetcher = new GradeFetcher();
            $gradeID = $grdFetcher->getGradingID($stdID, $_SESSION['userID'], $_POST['course']);
            if (is_null($gradeID)) {
                echo json_encode('Dont exist');
            } else {
                $approvalID = $grdFetcher->getApprovalID($gradeID);
                $submission = $grdFetcher->approvedByReg($approvalID);
                if ($submission == 1) {
                    echo json_encode('Approved');
                } else {
                    echo json_encode('Submitted');
                }
            }
            break;
        case 'getSubmittedGrades':
            $grdFetcher = new GradeFetcher();
            echo json_encode($grdFetcher->getSubmittedGrades($_SESSION['userID'], $_POST['section'], $_POST['course']));
            break;
    }
} else {
    exit();
}