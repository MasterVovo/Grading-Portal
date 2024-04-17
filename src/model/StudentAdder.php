<?php
// A class for uploading new student

require_once 'DBConn.php';

class StudentAdder {
    private $id, $fname, $mname, $lname, $email, $pass;

    public function __construct($id, $fname, $mname, $lname, $email, $pass) {
        $this->id = $id;
        $this->fname = $fname;
        $this->mname = $mname;
        $this->lname = $lname;
        $this->email = $email;
        $this->pass = $pass;
    }

    public function uploadToDB() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "INSERT INTO tblstd(id, fname, mname, lname, email, pass) VALUES (:id, :fname, :mname, :lname, :email, :pass)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id' => $this->id,
            ':fname' => $this->fname,
            ':mname' => $this->mname,
            ':lname' => $this->lname,
            ':email' => $this->email,
            ':pass' => $this->pass
        ]);
    }
}