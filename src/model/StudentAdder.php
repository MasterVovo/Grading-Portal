<?php
// A class for uploading new student

require_once 'DBConn.php';

class StudentAdder {
    private $id, $fname, $mname, $lname, $email, $pass, $sect, $dept;

    public function __construct($id, $fname, $mname, $lname, $email, $pass, $sect, $dept) {
        $this->id = $id;
        $this->fname = $fname;
        $this->mname = $mname;
        $this->lname = $lname;
        $this->email = $email;
        $this->pass = $pass;
        $this->sect = $sect;
        $this->dept = $dept;
    }

    public function uploadToDB() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "INSERT INTO tblstd(id, fname, mname, lname, email, pass, sect, dept) VALUES (:id, :fname, :mname, :lname, :email, :pass, :sect, :dept)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':id' => $this->id,
            ':fname' => $this->fname,
            ':mname' => $this->mname,
            ':lname' => $this->lname,
            ':email' => $this->email,
            ':pass' => $this->pass,
            ':sect' => $this->sect,
            ':dept' => $this->dept
        ]);

        if ($result)
            echo "Query executed successfully.";
        else
            echo $conn->errorInfo();
    }
}