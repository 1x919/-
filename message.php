<?php
session_start();  // 開啟 session 用來顯示操作結果訊息
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>操作結果</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* 全局背景 */
        body {
            background: linear-gradient(to right, #a8d5ba, #b3e0ff); /* 藍綠色系漸層 */
            font-family: 'Arial', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* 設置訊息卡片 */
        .message-container {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            padding: 40px;
            text-align: center;
            width: 80%;
            max-width: 500px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* 標題設置 */
        .message-container h1 {
            font-size: 36px;
            color: #4CAF50; /* 統一使用綠色 */
            margin-bottom: 20px;
            font-weight: 700;
        }

        /* 訊息段落 */
        .message-container p {
            font-size: 18px;
            color: #4CAF50; /* 統一使用綠色 */
            line-height: 1.6;
            margin-bottom: 30px;
            font-weight: 400;
        }

        /* 設置倒數顯示 */
        .countdown {
            font-size: 24px;
            font-weight: bold;
            color: #e53935; /* 倒數數字顯示紅色 */
            margin-top: 20px;
        }

        /* 設置按鈕 */
        .btn-back {
            background-color: #4CAF50; /* 綠色按鈕 */
            color: white;
            font-size: 18px;
            padding: 12px 30px;
            border-radius: 30px;
            border: none;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background-color 0.3s, transform 0.2s;
            margin-top: 20px;
            text-decoration: none; /* 移除文字底線 */
        }

        /* 按鈕懸浮效果 */
        .btn-back:hover {
            background-color: #45a049; /* 亮綠色 */
            transform: translateY(-3px); /* 按鈕懸浮效果 */
        }

        /* 訊息框樣式 */
        .alert {
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            font-size: 18px;
            font-weight: 500;
        }

        /* 成功訊息樣式 */
        .alert-success {
            background-color: #e8f5e9; /* 淺綠色成功訊息 */
            color: #4CAF50; /* 使用統一綠色文字 */
        }

        /* 失敗訊息樣式 */
        .alert-danger {
            background-color: #f8d7da; /* 淺紅色失敗訊息 */
            color: #e53935; /* 這裡使用更柔和的紅色 */
        }

        .alert-dismissible .btn-close {
            background-color: transparent;
            border: none;
        }

    </style>
</head>
<body>

    <div class="message-container">
        <!-- 顯示操作結果訊息 -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <!-- 標題與訊息 -->
        <h1>您的操作已經成功執行</h1>
        
        <!-- 倒數計時 -->
        <p><div id="countdown" class="countdown">5秒後自動返回</div></p>
        
        <!-- 返回報告書上傳頁面的按鈕 -->
        <a href="報告書上傳.php" id="back-btn" class="btn-back">快速返回</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // 設定倒數計時
        let countdownElement = document.getElementById('countdown');
        let countdownValue = 5;  // 設定倒數從 5 秒開始

        // 立即顯示倒數 5秒
        countdownElement.textContent = countdownValue + "秒後自動返回";  // 頁面一開始顯示 5秒

        // 更新倒數數字
        let countdownInterval = setInterval(function() {
            countdownValue--;  // 每秒減少 1
            countdownElement.textContent = countdownValue + "秒後自動返回";  // 更新顯示文字

            // 當倒數結束時，跳轉頁面
            if (countdownValue < 0) {
                clearInterval(countdownInterval);  // 停止倒數
                window.location.href = '報告書上傳.php';  // 跳轉頁面
            }
        }, 1000); // 每秒更新一次
    </script>
</body>
</html>
