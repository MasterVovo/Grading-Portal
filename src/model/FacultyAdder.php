<?php
// A class for uploading new student

require_once 'DBConn.php';
require_once 'sendEmail.php';

class FacultyAdder
{
    public function __construct()
    {
    }

    public function uploadBulkFct($bulkData)
    {
        for ($i = 0; $i < count($bulkData->id); $i++) {
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $passArray = array();
            $charLen = strlen($characters) - 1;
            for ($i = 0; $i < 8; $i++) {
                $char = $characters[rand(0, $charLen)];
                $passArray[] = $char;
            }
            $password = implode($passArray);
            $tempPass = "12345";

            if ($this->uploadToDB($bulkData->id[$i], $bulkData->{'First name'}[$i], $bulkData->{'Middle name'}[$i], $bulkData->{'Last name'}[$i], $bulkData->Email[$i], $tempPass, 1, 1) == "Faculty Added Successfully") {
                sendEmail($bulkData->id[$i], $bulkData->{'First name'}[$i], $bulkData->{'Middle name'}[$i], $bulkData->{'Last name'}[$i], $bulkData->Email[$i], $tempPass);
                continue;
            } else {
                return 'Something went wrong. Faculty ' . $bulkData->id[$i] . ' and beyond were not added.';
            }
        }
        return 'Teachers Added Successfully';
    }

    public function uploadToDB($id, $fname, $mname, $lname, $email, $pass, $fctType, $status)
    {
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
