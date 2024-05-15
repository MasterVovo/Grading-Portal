<?php
// API for fetching the chart data

require_once '../model/ChartFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $chartFetcher = new ChartFetcher();

    switch($_POST['method']) {
        case 'getActiveUsers':
            echo $chartFetcher->getActiveUsers();
            break;
        case 'getTotalStudent':
            echo $chartFetcher->getTotalStudent();
            break;
        case 'getTotalFaculty':
            echo $chartFetcher->getTotalFaculty();
            break;
        case 'getTotalFailuresAndPassers':
            $totalFails = $chartFetcher->getTotalFailures();
            $totalPasses = $chartFetcher->getTotalPassers();
            $arr = array();
            $arr += $totalFails;
            $arr += $totalPasses;
            echo json_encode($arr);
            break;
        case 'getGradeHistory':
            $gradeHistory = array();
            $gradeHistory['firstYear']['avg'] = $chartFetcher->getAvgGrade(1);
            $gradeHistory['secondYear']['avg'] = $chartFetcher->getAvgGrade(2);
            $gradeHistory['thirdYear']['avg'] = $chartFetcher->getAvgGrade(3);
            $gradeHistory['fourthYear']['avg'] = $chartFetcher->getAvgGrade(4);

            $gradeHistory['firstYear']['studCount'] = $chartFetcher->countStudents(1);
            $gradeHistory['secondYear']['studCount'] = $chartFetcher->countStudents(2);
            $gradeHistory['thirdYear']['studCount'] = $chartFetcher->countStudents(3);
            $gradeHistory['fourthYear']['studCount'] = $chartFetcher->countStudents(4);

            $gradeHistory['firstYear']['1Y1S'] = $chartFetcher->getGradeHistory(1, 1, 1);
            $gradeHistory['firstYear']['1Y2S'] = $chartFetcher->getGradeHistory(1, 1, 2);

            $gradeHistory['secondYear']['1Y1S'] = $chartFetcher->getGradeHistory(2, 1, 1);
            $gradeHistory['secondYear']['1Y2S'] = $chartFetcher->getGradeHistory(2, 1, 2);
            $gradeHistory['secondYear']['2Y1S'] = $chartFetcher->getGradeHistory(2, 2, 1);
            $gradeHistory['secondYear']['2Y2S'] = $chartFetcher->getGradeHistory(2, 2, 2);

            $gradeHistory['thirdYear']['1Y1S'] = $chartFetcher->getGradeHistory(3, 1, 1);
            $gradeHistory['thirdYear']['1Y2S'] = $chartFetcher->getGradeHistory(3, 1, 2);
            $gradeHistory['thirdYear']['2Y1S'] = $chartFetcher->getGradeHistory(3, 2, 1);
            $gradeHistory['thirdYear']['2Y2S'] = $chartFetcher->getGradeHistory(3, 2, 2);
            $gradeHistory['thirdYear']['3Y1S'] = $chartFetcher->getGradeHistory(3, 3, 1);
            $gradeHistory['thirdYear']['3Y2S'] = $chartFetcher->getGradeHistory(3, 3, 2);

            $gradeHistory['fourthYear']['1Y1S'] = $chartFetcher->getGradeHistory(4, 1, 1);
            $gradeHistory['fourthYear']['1Y2S'] = $chartFetcher->getGradeHistory(4, 1, 2);
            $gradeHistory['fourthYear']['2Y1S'] = $chartFetcher->getGradeHistory(4, 2, 1);
            $gradeHistory['fourthYear']['2Y2S'] = $chartFetcher->getGradeHistory(4, 2, 2);
            $gradeHistory['fourthYear']['3Y1S'] = $chartFetcher->getGradeHistory(4, 3, 1);
            $gradeHistory['fourthYear']['3Y2S'] = $chartFetcher->getGradeHistory(4, 3, 2);
            $gradeHistory['fourthYear']['4Y1S'] = $chartFetcher->getGradeHistory(4, 4, 1);
            $gradeHistory['fourthYear']['4Y2S'] = $chartFetcher->getGradeHistory(4, 4, 2);

            echo json_encode($gradeHistory);
            break;
    }
} else {
    exit();
}