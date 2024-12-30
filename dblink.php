<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="refresh" content="1; url=管理者首頁.php">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .message-box {
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      width: 300px;
      box-shadow: 0 4px 8px rgba(0, 128, 0, 0.3); 
      border: 3px solid #28a745; 
      background-color: #ffffff; 
    }
    .success {
      color: #155724;
      font-size: 16px;
      font-weight: bold;
    }
    .error {
      color: #721c24;
      font-size: 16px;
      font-weight: bold;
    }
    .message-box p {
      margin: 0;
      font-size: 16px;
    }
  </style>
</head>
<body>
    <div class="message-box">
    <?php
        //$method = $_GET['method'];
        if(empty($_GET['method'])) {
            // Modify
            $newsid = $_POST['newsid'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $newsdate = $_POST['newsdate'];

            // Step 1
            $link = mysqli_connect('localhost', 'root', '', 'test');
            // Step 3
            $sql = "UPDATE news SET title='$title', content='$content', newsdate='$newsdate' WHERE newsid = '$newsid'";

            if(mysqli_query($link, $sql)) {
                echo "<p class='success'>修改完成！</p>";
            } else {
                echo "<p class='error'>修改失敗，請稍後再試。</p>";
            }
        }
        elseif($_GET['method'] == "delete") {
            $newsid = $_GET['newsid'];
            $link = mysqli_connect('localhost', 'root');
            mysqli_select_db($link, "test");

            $sql = "DELETE FROM news WHERE newsid='$newsid'";
            if(mysqli_query($link, $sql)) {
                echo "<p class='success'>刪除完成！</p>";
            } else {
                echo "<p class='error'>刪除失敗，請稍後再試。</p>";
            }
        }
    ?>
    </div>
</body>
</html>

