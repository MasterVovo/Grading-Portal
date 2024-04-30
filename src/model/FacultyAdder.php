<?php
// A class for uploading new student

require_once 'DBConn.php';

class FacultyAdder {
    public function __construct() {

    }

    public function uploadBulkFct($bulkData) {
        for ($i = 0; $i < count($bulkData->id); $i++) {
            if ($this->uploadToDB($bulkData->id[$i], $bulkData->{'First name'}[$i], $bulkData->{'Middle name'}[$i], $bulkData->{'Last name'}[$i], $bulkData->Email[$i], '123', 1, 1) == "Faculty Added Successfully") {
                continue;
            } else {
                return 'Something went wrong. Faculty ' . $bulkData->id[$i] . ' and beyond were not added.';
            }
        }
        return 'Teachers Added Successfully';
    }

    public function uploadToDB($id, $fname, $mname, $lname, $email, $pass, $fctType, $status) {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "INSERT INTO faculty(facultyID, facultyFName, facultyMName, facultyLName, facultyEmail, facultyPass, facultyType, facultyStatus) VALUES (:id, :fname, :mname, :lname, :email, :pass, :fctType, :status)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':id' => $id,
            ':fname' => $fname,
            ':mname' => $mname,
            ':lname' => $lname,
            ':email' => $email,
            ':pass' => $pass,
            ':fctType' => $fctType,
            ':status' => $status
        ]);

        if ($result)
            return "Faculty Added Successfully";
        else
            return $conn->errorInfo();
    }
}