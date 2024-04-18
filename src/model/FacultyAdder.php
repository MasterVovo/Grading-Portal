<?php
// A class for uploading new student

require_once 'DBConn.php';

class FacultyAdder {
    private $id, $fname, $mname, $lname, $email, $pass;

    public function __construct($id, $fname, $mname, $lname, $email, $pass, $dept) {
        $this->id = $id;
        $this->fname = $fname;
        $this->mname = $mname;
        $this->lname = $lname;
        $this->email = $email;
        $this->pass = $pass;
        $this->dept = $dept;
    }

    public function uploadToDB() {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "INSERT INTO tblfct(id, fname, mname, lname, email, pass, dept) VALUES (:id, :fname, :mname, :lname, :email, :pass, :dept)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':id' => $this->id,
            ':fname' => $this->fname,
            ':mname' => $this->mname,
            ':lname' => $this->lname,
            ':email' => $this->email,
            ':pass' => $this->pass,
            ':dept' => $this->dept
        ]);

        if ($result)
            echo "Query executed successfully.";
        else
            echo $conn->errorInfo();
    }
}