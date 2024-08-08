<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

session_start();

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "users_db";

$conn = new mysqli($servername, $dbusername, $dbpassword);

if($conn->connect_error){
    die(json_encode(['status' => 'error', 'message => "Connection failed: ' . $conn->connect_error]));
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";











?>