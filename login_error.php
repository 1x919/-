<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入錯誤</title>
    <!-- 使用 Bootstrap 來設計樣式 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f6f9; /* 背景色 */
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 500px;
            margin-top: 100px;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* 添加陰影 */
        }

        .alert {
            border-radius: 5px;
            padding: 20px;
            font-size: 18px;
            text-align: center;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        #countdown {
            font-weight: bold;
            font-size: 24px;
            color: #dc3545; /* 顯示紅色 */
        }

        /* 添加一些過渡效果 */
        .alert, #countdown {
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        /* 自定義淡入效果 */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // 顯示錯誤訊息
        if (isset($_SESSION['error_message'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
            unset($_SESSION['error_message']);
        }
        ?>

        <div class="alert alert-info">
            <p>您將在 <span id="countdown">3</span> 秒後返回登入頁面。</p>
        </div>
    </div>

    <script type="text/javascript">
        // 設定倒數計時從 3 開始
        let countdown = 3;
        const countdownElement = document.getElementById('countdown');

        // 每秒減少倒數
        const interval = setInterval(function() {
            countdown--;
            countdownElement.textContent = countdown;

            // 當倒數結束時，跳轉回 login.php
            if (countdown <= 0) {
                clearInterval(interval);  // 停止倒數
                window.location.href = "login.php";  // 跳轉回 login.php
            }
        }, 1000);  // 每 1000 毫秒（即 1 秒）執行一次
    </script>
</body>
</html>
