<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// 建立資料庫連接
$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
