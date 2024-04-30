<?php
// A class for uploading new student

require_once 'DBConn.php';

class StudentAdder {

    public function __construct() {

    }

    public function uploadToDB($id, $fname, $mname, $lname, $email, $pass, $sect) {
        $conn = DBConn::getInstance()->getConnection();
        
        // Check if mname has a value, if not set it to "N/A"
        if(empty($mname)) {
            $mname = "";
        }

        $sql = "INSERT INTO student(studentID, studentFName, studentMName, studentLName, studentEmail, studentPass, studentSect) VALUES (:id, :fname, :mname, :lname, :email, :pass, :sect)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':id' => $id,
            ':fname' => $fname,
            ':mname' => $mname,
            ':lname' => $lname,
            ':email' => $email,
            ':pass' => $pass,
            ':sect' => $sect
        ]);

        if ($result)
            return "Student Added Successfully";
        else
            return $conn->errorInfo();
    }

    public function uploadBulkStd($bulkData) {
        for ($i = 0; $i < count($bulkData->id); $i++) {
            if ($this->uploadToDB($bulkData->id[$i], $bulkData->{'First name'}[$i], $bulkData->{'Middle name'}[$i], $bulkData->{'Last name'}[$i], $bulkData->Email[$i], '123', $bulkData->Section[$i]) == "Student Added Successfully") {
                continue;
            } else {
                return 'Something went wrong. Student ' . $bulkData->id[$i] . ' and beyond were not added.';
            }
        }
        return 'Students Added Successfully';
    }
}