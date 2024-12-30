<?php
// 開始會話
session_start();

// 檢查表單是否提交
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 接收使用者輸入
    $identity = $_POST['identity'] ?? ''; // 身份
    $name = $_POST['name'] ?? ''; // 帳號
    $password = $_POST['password'] ?? ''; // 密碼

    // 連接資料庫
    $link = mysqli_connect('localhost', 'root', '', 'test');
    if (!$link) {
        die("Database Connection Failed: " . mysqli_connect_error());
    }

    // 使用預處理語句查詢
    $sql = "SELECT * FROM user WHERE name = ? AND level = ?";
    $stmt = mysqli_prepare($link, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $name, $identity);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // 檢查密碼是否正確
            if ($password === $row['password']) {
                // 登入成功，設置 Session
                $_SESSION['name'] = $row['name'];
                $_SESSION['level'] = $row['level']; // 角色資訊

                // 設置成功訊息
                $_SESSION['success_message'] = "登入成功，正在跳轉...";

                // 根據身份導向不同頁面
                if ($row['level'] === 'admin') {
                    header("Location: login_success.php?redirect=管理者首頁.php");
                    exit();
                } elseif ($row['level'] === 'department') {
                    header("Location: login_success.php?redirect=系所首頁.php");
                    exit();
                } elseif ($row['level'] === 'student') {
                    header("Location: login_success.php?redirect=學生首頁.php");
                    exit();
                }
            } else {
                // 密碼錯誤，重定向至 error.php
                $_SESSION['error_message'] = "登入失敗，密碼錯誤!";
                header("Location: login_error.php");
                exit();
            }
        } else {
            // 帳號不存在，重定向至 error.php
            $_SESSION['error_message'] = "登入失敗，帳號不存在!";
            header("Location: login_error.php");
            exit();
        }

        // 關閉語句
        mysqli_stmt_close($stmt);
    } else {
        echo "SQL Error: " . mysqli_error($link);
    }

    // 關閉資料庫連接
    mysqli_close($link);
}
?>
