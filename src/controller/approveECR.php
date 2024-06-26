<?php
// API for approving ECR

session_start();
require_once '../model/ApprovalUploader.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch($_SESSION['userType']) {
        case 'Program Chair':
            $apprUploader = new ApprovalUploader();
            echo json_encode($apprUploader->approveChair($_POST['approvalID'], $_POST['term']));
            break;
        case 'Dean':
            $apprUploader = new ApprovalUploader();
            echo json_encode($apprUploader->approveDean($_POST['approvalID'], $_POST['term']));
            break;
        case 'Registrar':
            $apprUploader = new ApprovalUploader();
            echo json_encode($apprUploader->approveRegistrar($_POST['approvalID'], $_POST['term']));
            break;
    }
} else {
    exit();
}