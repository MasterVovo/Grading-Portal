<?php
// API for setting the courses that teachers taught

require_once '../model/CourseAssigner.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crsAssgr = new CourseAssigner($_POST['facultyID'], $_POST['courseCode']);
    if ($crsAssgr->specializationExist())
        echo 'Subject assignment already exist';
    else {
        $res = $crsAssgr->assignCourse();
        if ($res)
            echo 'success';
        else
            echo $res;
    }
} else {
    exit();
}