<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="1; url=管理者首頁.php">
    <title>Document</title>
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
            $newsid = $_POST['newsid'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $newsdate = $_POST['newsdate'];

            // Step 1: Connect to the database
            $link = mysqli_connect('localhost', 'root', '', 'test');

            // Step 2: Insert the data into the database
            $sql = "INSERT INTO news (newsid, title, content, newsdate) VALUES ('$newsid', '$title', '$content', '$newsdate')";

            // Step 3: Check the result of the query
            if (mysqli_query($link, $sql)) {
                echo "<p class='success'>新增完成！</p>";
            } else {
                echo "<p class='error'>新增失敗，請再次確認是否符合規範。</p>"; 
            }
        ?>
    </div>
</body>
</html>
