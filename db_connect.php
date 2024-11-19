<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "survey_db";

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
