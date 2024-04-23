<?php
// A class for uploading new student

require_once 'DBConn.php';

class FacultyAdder {
    private $id, $fname, $mname, $lname, $email, $pass, $fctType;

    public function __construct($id, $fname, $mname, $lname, $email, $pass, $fctType) {
        $this->id = $id;
        $this->fname = $fname;
        $this->mname = $mname;
        $this->lname = $lname;
        $this->email = $email;
        $this->pass = $pass;
        $this->fctType = $fctType;
    }

    public function uploadToDB() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "INSERT INTO faculty(facultyID, facultyFName, facultyMName, facultyLName, facultyEmail, facultyPass, facultyType) VALUES (:id, :fname, :mname, :lname, :email, :pass, :fctType)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':id' => $this->id,
            ':fname' => $this->fname,
            ':mname' => $this->mname,
            ':lname' => $this->lname,
            ':email' => $this->email,
            ':pass' => $this->pass,
            ':fctType' => $this->fctType,
        ]);

        if ($result)
            echo "Query executed successfully.";
        else
            echo $conn->errorInfo();
    }
}