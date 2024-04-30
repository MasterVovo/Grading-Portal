<?php
// A class for retrieving student data

require_once 'DBConn.php';

class StudentFetcher
{
    public function __construct()
    {
    }

    public function getAllStd()
    {
        $conn = DBConn::getInstance()->getConnection();

        $sql = "SELECT studentID, studentFName, studentMName, studentLName, studentEmail, studentSect FROM student WHERE studentStatus in (1,2)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }

    public function getStdBySct($sct)
    {
        $conn = DBConn::getInstance()->getConnection();
        
        $sql = "SELECT * FROM student WHERE studentSect = :sct";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            ':sct' => $sct
        ]);

        if ($result)
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        else
            return json_encode(["error" => "Failed to fetch data"]);
    }
}
