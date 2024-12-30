<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>產業實習平台</title>
    <!--CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--CSS-->
    <link rel="stylesheet" href="style.css">
    <!--按鈕-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .btn-custom {
            font-size: 0.8rem; /* 調整字體大小 */
            margin-left: auto; /* 使按鈕靠右 */
            border-radius: 0.2rem; /* 調整圓角 */
            max-width: 100px; /* 最長寬度 */
            height: auto; /* 自適應高度 */
            background-color: rgb(73, 134, 248);
        }
        .form-container {
            max-width: 700px;
            width: 100%;
            background-color: #ffffff;
            padding: 30px;
            margin-left:130px;
            margin-top:20px;
            margin-bottom:20px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            transition: box-shadow 0.3s ease-in-out;
        }

        .form-container:hover {
            box-shadow: 0 0 20px rgba(173, 216, 230, 0.8), 0 0 30px rgba(173, 216, 230, 0.6);
        }

        h2 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 600;
            padding: 10px;
            background-color: #add8e6;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-table {
            width: 100%;
            margin-top: 15px;
            border-collapse: separate;
            border-spacing: 0 8px;
        }

        .form-table td {
            padding: 8px;
            font-size: 16px;
            color: #555;
            vertical-align: middle;
        }

        .form-table input[type="text"],
        .form-table input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            background-color: #f9f9f9;
            transition: border-color 0.3s;
        }

        .form-table input[type="text"]:focus,
        .form-table input[type="date"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .form-table input[type="submit"],
        .form-table input[type="reset"] {
            width: 48%;
            padding: 14px;
            margin-top: 15px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: bold;
        }

        .form-table input[type="submit"] {
            background-color: #4CAF50;
        }

        .form-table input[type="submit"]:hover {
            background-color: #45a049;
        }

        .form-table input[type="reset"] {
            background-color: #f44336;
        }

        .form-table input[type="reset"]:hover {
            background-color: #e53935;
        }

        .form-table td:first-child {
            width: 30%;
        }

        .form-table td:last-child {
            width: 70%;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }

            h2 {
                font-size: 20px;
            }

            .form-table input[type="submit"],
            .form-table input[type="reset"] {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div id="header-top">
            <h1>產業實習平台</h1>
            <nav id="login-nav"> 
                <ul>
                    <li><a href="login.php"><i class="fas fa-user icon"></i>登入</a></li>
                </ul>
            </nav>
        </div>
        <nav id="main-nav">
            <ul>
                <li><a href="首頁.html">首頁</a></li>
                <li><a href="實習資料管理.html">實習資料管理</a></li>
                <li><a href="報告書上傳.html">報告書上傳</a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#subscriptionModal">選擇訂閱內容</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div id="wrapper">
            <div id="item1"></div>
            <div id="item2">
                <div id="home">
                    <div class="container">
                        <?php
                            $newsid = $_GET['newsid'];
                            $link = mysqli_connect('localhost', 'root', '', 'test');
                            $sql = "SELECT * FROM news WHERE newsid ='$newsid'";
                            $result = mysqli_query($link, $sql);
                            if($row = mysqli_fetch_assoc($result)) {
                                $newsid = $row['newsid'];
                                $title = $row['title'];
                                $content = $row['content'];
                                $newsdate = $row['newsdate'];
                            }
                        ?>
                        <div class="form-container">
                            <h2>新增公告</h2>
                            <form action="insert.php" method="post">
                                <table class="form-table">
                                    <tr>
                                        <td>公告編號</td>
                                        <td><input type="text" name="newsid" required placeholder="請輸入公告編號"></td>
                                    </tr>
                                    <tr>
                                        <td>公告標題</td>
                                        <td><input type="text" name="title" required placeholder="請輸入公告標題"></td>
                                    </tr>
                                    <tr>
                                        <td>公告內容</td>
                                        <td><input type="text" name="content" required placeholder="請輸入公告內容"></td>
                                    </tr>
                                    <tr>
                                        <td>公告日期</td>
                                        <td><input type="date" name="newsdate" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: center;">
                                            <input type="submit" value="儲存">
                                            <input type="reset" value="重設">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
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