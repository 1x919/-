<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>產業實習平台 - 登入</title>
    <!--CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- 自訂CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div id="header-top">
            <h1>產業實習平台</h1>
            <div id="login-container">
                <nav id="login-nav">
                    <ul>
                        <li><a href="login.php">
                            <i class="fas fa-user icon"></i>登入
                        </a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <nav id="main-nav">
            <ul>
                <li><a href="首頁.html">首頁</a></li>
                <li><a href="實習資料管理.html">實習資料管理</a></li>
                <li><a href="報告書上傳.html">報告書上傳</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div id="wrapper">
            <div id="item1"></div>
            <div id="item2" style="padding: 30px;">
                <div id="container" style="margin-left: 30%;">
                    <h2 id="title">登入</h2>
                    <form action="login1.php" method="POST">
                        <div class="form-group">
                            <label for="identity">身份：</label>
                            <select id="identity" name="identity" class="form-control" required>
                                <option value="">請選擇身份</option>
                                <option value="admin">管理員</option>
                                <option value="department">系所</option>
                                <option value="student">學生</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">帳號：</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">密碼：</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;">登入</button>
                    </form>
                </div>
            </div>
            <div id="item3"></div>
        </div>
    </main>

    <footer id="footer">
        <p>© 奇怪的 產業實習平台. 版權所有.</p>
        <p><a href="隱私政策.html">隱私政策</a></p>
    </footer>
</body>
</html>
