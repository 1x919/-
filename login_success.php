<?php
session_start();

// 確保存在成功訊息，否則直接重定向回登入頁面
if (!isset($_SESSION['success_message'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入成功</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 500px;
            margin-top: 100px;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .alert {
            border-radius: 5px;
            padding: 20px;
            font-size: 18px;
            text-align: center;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        #countdown {
            font-weight: bold;
            font-size: 24px;
            color: #28a745; /* 綠色 */
        }

    </style>
</head>
<body>
    <div class="container">
        <?php
        // 顯示成功訊息
        echo "<div class='alert alert-success text-center'>" . $_SESSION['success_message'] . "</div>";
        unset($_SESSION['success_message']); // 清除成功訊息
        ?>

        <div class="alert alert-info text-center">
            <p>您將在 <span id="countdown">3</span> 秒後跳轉到您的首頁。</p>
        </div>
    </div>

    <script type="text/javascript">
        // 設定倒數計時從 3 開始
        let countdown = 3;
        const countdownElement = document.getElementById('countdown');
        const redirectUrl = new URLSearchParams(window.location.search).get('redirect'); // 取得重定向頁面的 URL

        // 每秒減少倒數
        const interval = setInterval(function() {
            countdown--;
            countdownElement.textContent = countdown;

            // 當倒數結束時，跳轉到指定的頁面
            if (countdown <= 0) {
                clearInterval(interval);  // 停止倒數
                window.location.href = redirectUrl;  // 跳轉到指定頁面
            }
        }, 1000);  // 每 1000 毫秒（即 1 秒）執行一次
    </script>
</body>
</html>
