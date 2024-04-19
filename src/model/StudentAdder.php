<?php
// A class for uploading new student

require_once 'DBConn.php';

class StudentAdder {
    private $id, $fname, $mname, $lname, $email, $pass, $sect, $year, $dept;

    public function __construct($id, $fname, $mname, $lname, $email, $pass, $sect, $year, $dept) {
        $this->id = $id;
        $this->fname = $fname;
        $this->mname = $mname;
        $this->lname = $lname;
        $this->email = $email;
        $this->pass = $pass;
        $this->sect = $sect;
        $this->year = $year;
        $this->dept = $dept;
    }

    public function uploadToDB() {
        $conn = DBConn::getInstance()->getConnection();
        
        // Check if mname has a value, if not set it to "N/A"
        if(empty($this->mname)) {
            $this->mname = "N/A";
        }

        $sql = "INSERT INTO student(studentID, studentFName, studentMName, studentLName, studentEmail, studentPass, studentDept, studentYear, studentSect) VALUES (:id, :fname, :mname, :lname, :email, :pass, :dept, :year, :sect)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':id' => $this->id,
            ':fname' => $this->fname,
            ':mname' => $this->mname,
            ':lname' => $this->lname,
            ':email' => $this->email,
            ':pass' => $this->pass,
            ':dept' => $this->dept,
            ':year' => $this->year,
            ':sect' => $this->sect
        ]);

        if ($result)
            echo "Query executed successfully.";
        else
            echo $conn->errorInfo();
    }
}