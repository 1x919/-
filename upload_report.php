<?php
include 'db_report.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['reportTitle'];
    $file = $_FILES['reportFile'];
    $fileName = basename($file['name']);
    $fileTmp = $file['tmp_name'];
    $filePath = "uploads/" . $fileName;

    if (move_uploaded_file($fileTmp, $filePath)) {
        $date = date("Y-m-d");
        $sql = "INSERT INTO reports (title, file_name, date) VALUES ('$title', '$fileName', '$date')";
        if ($conn->query($sql) === TRUE) {
            header('Location: 報告書上傳.php'); // 重定向回上傳頁面
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "File upload failed!";
    }
}
?>
