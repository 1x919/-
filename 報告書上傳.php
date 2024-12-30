<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>產業實習平台</title>
    <!--CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--CSS-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f9f9f9;
        }
        #modal {
            position: fixed;
            top: 0px;
            left: 50%;
            transform: translate(-50%, 0);
            padding: 20px;
            background: linear-gradient(145deg, rgba(173, 216, 230, 0.9), rgba(135, 206, 250, 0.9));
            border-radius: 12px;
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.2), 
                        0 -4px 20px rgba(255, 255, 255, 0.8);
            width: 300px;
            z-index: 1050;
            display: none;
        }

        #modal h2 {
            margin: 0 0 15px;
            font-size: 20px;
            color: #333;
            font-weight: bold;
        }

        #modal button {
            margin: 5px 0;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            background-color: rgba(255, 255, 255, 0.8);
            color: #333;
            width: 100%;
            font-size: 14px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        #modal button:hover {
            background-color: rgba(255, 255, 255, 1);
            transform: scale(1.05);
        }

        #modal button:active {
            transform: scale(0.95);
        }

        #reports {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <header>
        <div id="header-top">
            <h1>產業實習平台</h1>
            <div id="login-container">
                <nav id="login-nav"> 
                    <ul>
                        <li><a href="login.html">
                            <i class="fas fa-user icon"></i>登入
                        </a></li>
                    </ul>
                </nav>
            </div>
        </div>
    
        <nav id="main-nav">
            <ul>
                <li><a href="學生首頁.php">首頁</a></li>
                <li><a href="實習資料管理.html">實習資料管理</a></li>
                <li><a href="報告書上傳.php">報告書上傳</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <div id="wrapper">
            <div id="item1"></div>
            <div id="item2" style="background-color: antiquewhite; padding: 30px;">
                <h1 id="title">實習報告書上傳系統</h1>
    
                <form id="uploadForm" action="upload_report.php" method="post" enctype="multipart/form-data">
                    <label for="reportTitle">報告標題:</label>
                    <input type="text" name="reportTitle" id="reportTitle" required class="form-control"><br>
                    <label for="reportFile">上傳檔案:</label>
                    <input type="file" name="reportFile" id="reportFile" required class="form-control"><br>
                    <button type="submit" id="submitButton" class="btn btn-primary">上傳報告</button>
                </form>
    
                <div id="reports">
                    <h2>已上傳的報告</h2>
                    <table id="reportList">
                        <thead>
                            <tr>
                                <th>報告標題</th>
                                <th>檔案名稱</th>
                                <th>上傳日期</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include 'db_report.php';
                                $sql = "SELECT * FROM reports";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["title"] . "</td>";
                                        echo "<td>" . $row["file_name"] . "</td>";
                                        echo "<td>" . $row["date"] . "</td>";
                                        echo "<td><a href='edit_report.php?id=" . $row["id"] . "' class='btn btn-secondary'>檢視</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>沒有報告</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
            <div id="item3"></div>
        </div>
    </main>

    <footer id="footer">
        <p>© 奇怪的 產業實習平台. 版權所有.</p>
        <p><a href="隱私政策.html">隱私政策</a>
    </footer>
</body>
</html>
