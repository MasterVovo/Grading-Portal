<?php
// API for fetching the section list

require_once '../model/SectionFetcher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sctFetcher = new SectionFetcher();
    echo $sctFetcher->getAllSct();
    // echo $fctFetcher->uploadToDB();
} else {
    exit();
}