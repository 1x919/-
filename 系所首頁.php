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
            font-size: 0.8rem;
            margin-left: auto;
            border-radius: 0.2rem; 
            max-width: 100px;
            height: auto; 
            background-color: rgb(73, 134, 248);
        }
        .inserttype{
            margin-left:400px;
        }
        .inserttype .btn {
            display: inline-block;
            padding: 12px 30px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(135deg, #f8f4e3, #e2d8b7); 
            border: none;
            border-radius: 25px;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }

        .inserttype .btn:hover {
            background: linear-gradient(135deg, #e2d8b7, #f8f4e3); 
            transform: translateY(-4px); 
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); 
        }

        .inserttype .btn:active {
            transform: translateY(2px); 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
                <li><a href="報告書上傳.php">報告書上傳</a></li>
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
                        <div class="section news-section">
                            <h2 class="section-title">最新消息 NEWS</h2>
                            
                            <!-- 開始循環顯示公告 -->
                            <?php
                            // 連接到資料庫
                            $link = mysqli_connect('localhost', 'root', '', 'test');
                            
                            // 查詢資料表中的公告
                            $sql = "SELECT * FROM news";
                            $result = mysqli_query($link, $sql);
                            
                            // 輸出每一筆資料並以左右排列顯示
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "
                                <div class='news-item mb-4'>
                                    <div class='card shadow-sm border-0 rounded-lg'>
                                        <div class='card-body d-flex justify-content-between'>
                                        
                                            <div class='left-content'>
                                                <h5 class='card-title text-primary'>" . $row['title'] . "</h5>
                                                <p class='card-text text-muted'>" . $row['content'] . "</p>
                                                <p class='card-text'>
                                                    <small class='text-muted'>" . $row['newsdate'] . "</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                            }
                            ?>
                        </div>
                        <!-- 實習職缺-->
                        <div class="section internship-section">
                            <h2 class="section-title">實習職缺 INTERNSHIP OPPORTUNITIES</h2>
                            <table class="internship-table">
                                <thead class="table-header">
                                    <tr>
                                        <th class="table-cell">機構名稱</th>
                                        <th class="table-cell">產業類別</th>
                                        <th class="table-cell">職務類別</th>
                                        <th class="table-cell">實習職缺名稱</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="internship-item">
                                        <td class="table-cell"><a href="#">國富浩華聯合會計師事務所 - 彰化所</a></td>
                                        <td class="table-cell"><a href="#">法律/會計/金融/研發設計業</a></td>
                                        <td class="table-cell"><a href="#">財會/金融專業類</a></td>
                                        <td class="table-cell"><a href="#">實習生</a></td>
                                    </tr>
                                    <tr class="internship-item">
                                        <td class="table-cell"><a href="#">樂活資訊服務股份有限公司</a></td>
                                        <td class="table-cell"><a href="#">電子資訊軟體/半導體相關業</a></td>
                                        <td class="table-cell"><a href="#">傳播藝術/設計類</a></td>
                                        <td class="table-cell"><a href="#">平面設計師</a></td>
                                    </tr>
                                    <tr class="internship-item">
                                        <td class="table-cell"><a href="#">樂活資訊服務股份有限公司</a></td>
                                        <td class="table-cell"><a href="#">電子資訊軟體/半導體相關業</a></td>
                                        <td class="table-cell"><a href="#">行銷企劃/專案管理類</a></td>
                                        <td class="table-cell"><a href="#">企劃/業務專員</a></td>
                                    </tr>
                                </tbody>
                            </table>                                               
                            <p align="center"><a href="找實習.html" class="search-button">搜尋更多</a></p>
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