<?php
// API for geting the grades

session_start();
require_once '../model/GradeFetcher.php';
require_once '../model/StudentFetcher.php';
require_once '../model/ApprovalFetcher.php';
require_once '../model/ECRFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    switch ($_POST['method']) {
        case 'gradeStatus':
            $stdFetcher = new StudentFetcher();
            $students = json_decode($stdFetcher->getStdBySct($_POST['section']), true);
            $stdID = $students[0]['studentID'];

            $grdFetcher = new GradeFetcher();
            if ($_POST['term'] == 'midterm') {
                $gradeID = $grdFetcher->midtermGradeExist($stdID, $_SESSION['userID'], $_POST['course']);
            } else if ($_POST['term'] == 'final') {
                $gradeID = $grdFetcher->finalGradeExist($stdID, $_SESSION['userID'], $_POST['course']);
            }
            
            if ($gradeID == false) {
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
        
        case 'getApprovalGrades':
            $apprFetcher = new ApprovalFetcher();
            switch($_SESSION['userType']) {
                case 'Program Chair':
                    $approvals = $apprFetcher->getToBeApprovedByChair();
                    break;
                case 'Dean':
                    $approvals = $apprFetcher->getToBeApprovedByDean();
                    break;
                case 'Registrar':
                    $approvals = $apprFetcher->getToBeApprovedByRegistrar();
                    break;
                case 'Admin':
                    $approvals = $apprFetcher->getToBeApprovedByRegistrar();
                    break;
            }
            
            $ecrList = array();
            
            $ecrFetcher = new ECRFetcher();
            for ($i = 0; $i < count($approvals); $i++) {
                $grades = $ecrFetcher->get($approvals[$i]['approvalID']);
                $ecrList[$i]['approvalID'] = $approvals[$i]['approvalID'];
                $ecrList[$i]['ecr'] = $grades;
            }
            echo json_encode($ecrList);
            break;
    }
} else {
    exit();
}