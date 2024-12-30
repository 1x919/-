<?php
session_start();  // 開啟 session 用來顯示操作結果訊息

// 包含資料庫連線
include 'db_report.php'; 

// 確保 'id' 被傳遞過來
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 從資料庫獲取該報告的資料
    $sql = "SELECT * FROM reports WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // 綁定 'id' 參數
    $stmt->execute();
    $result = $stmt->get_result();
    $report = $result->fetch_assoc();
    
    // 若該報告不存在，顯示錯誤訊息
    if (!$report) {
        echo "報告不存在";
        exit;
    }
} else {
    echo "未指定報告 ID";
    exit;
}

// 處理表單提交：更新報告或刪除報告
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        // 更新報告標題
        $newTitle = $_POST['reportTitle'];
        $newFile = $_FILES['reportFile'];

        // 處理檔案上傳
        if ($newFile['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            $newFileName = basename($newFile['name']);
            $filePath = $uploadDir . $newFileName;
            
            if (move_uploaded_file($newFile['tmp_name'], $filePath)) {
                // 更新報告的標題和檔案名稱
                $sql = "UPDATE reports SET title = ?, file_name = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssi", $newTitle, $newFileName, $id);
                $stmt->execute();
                
                // 設定成功訊息
                $_SESSION['message'] = '報告更新成功！';
                $_SESSION['message_type'] = 'success';
            } else {
                // 設定失敗訊息
                $_SESSION['message'] = '檔案上傳失敗，請重試。';
                $_SESSION['message_type'] = 'danger';
            }
        } else {
            // 如果沒有重新上傳檔案，僅更新標題
            $sql = "UPDATE reports SET title = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $newTitle, $id);
            $stmt->execute();
            
            // 設定成功訊息
            $_SESSION['message'] = '報告更新成功！';
            $_SESSION['message_type'] = 'success';
        }

        // 完成後跳轉到 message.php 顯示操作結果
        header("Location: message.php");
        exit;
    }

    if (isset($_POST['delete'])) {
        // 刪除報告
        $sql = "DELETE FROM reports WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // 刪除檔案
        unlink('uploads/' . $report['file_name']);
        
        // 設定刪除成功訊息
        $_SESSION['message'] = '報告已成功刪除！';
        $_SESSION['message_type'] = 'success';

        // 刪除後跳轉到 message.php 顯示操作結果
        header("Location: message.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯報告</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <header>
        <div id="header-top">
            <div class="container text-center">
                <h1>編輯報告</h1>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h2>報告標題：<?php echo htmlspecialchars($report['title']); ?></h2>
                    <p><strong>檔案名稱：</strong><?php echo htmlspecialchars($report['file_name']); ?></p>
                    <p><strong>上傳日期：</strong><?php echo htmlspecialchars($report['date']); ?></p>

                    <!-- 顯示檔案預覽 (圖片或 PDF) -->
                    <div class="form-group my-4">
                        <?php
                        $fileExtension = strtolower(pathinfo($report['file_name'], PATHINFO_EXTENSION));
                        if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                            echo "<img src='uploads/" . htmlspecialchars($report['file_name']) . "' alt='檔案預覽' class='img-fluid'>";
                        } elseif ($fileExtension == 'pdf') {
                            echo "<iframe src='uploads/" . htmlspecialchars($report['file_name']) . "' width='100%' height='400px'></iframe>";
                        } else {
                            echo "<p>無法顯示預覽</p>";
                        }
                        ?>
                    </div>

                    <!-- 編輯報告表單 -->
                    <form action="edit_report.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="reportTitle" class="form-label">報告標題：</label>
                            <input type="text" class="form-control" name="reportTitle" id="reportTitle" value="<?php echo htmlspecialchars($report['title']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="reportFile" class="form-label">重新上傳檔案：</label>
                            <input type="file" class="form-control" name="reportFile" id="reportFile">
                        </div>

                        <button type="submit" name="update" class="btn btn-primary">更新報告</button>
                    </form>

                    <!-- 刪除報告 -->
                    <form action="edit_report.php?id=<?php echo $id; ?>" method="POST" class="mt-3">
                        <button type="submit" name="delete" class="btn btn-danger">刪除報告</button>
                    </form>

                    <a href="報告書上傳.php" class="btn btn-secondary mt-3">返回報告上傳頁面</a>
                </div>
            </div>
        </div>
    </main>

    <footer id="footer">
        <p>© 奇怪的 產業實習平台. 版權所有.</p>
        <p><a href="隱私政策.html">隱私政策</a>
    </footer>
</body>
</html>
