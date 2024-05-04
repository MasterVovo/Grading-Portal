<?php
// A class for retrieving semester data from the database

require_once 'DBConn.php';

class SemesterFetcher
{
    public function __construct()
    {
    }

    public function getAll()
    {
        $conn = DBConn::getInstance()->getConnection();

        $sql = "SELECT * FROM semester";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        if ($result)
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return "Failed to fetch data";
    }
}
