<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background: url(/shop/public/images/bg1.jpg);">
<div class="header" >
    欢迎你，管理员:
    <?php
        if (isset($_SESSION['admin'])) {
            echo $_SESSION['admin'];
            ?>
            </div>
            <div class="sth">
                <div class="guanliyuanxuanxiang"><p>管理员选项</p></div>
                <div class="list">
                    <ul>
                        <li><a href="/shop/admin.php">管理员主页</a> </li>
                        <li><a href="/shop/view/admin/Manage/good/good.php">商品管理</a></li>
                        <li><a href="/shop/view/admin/Manage/category/category.php">分类管理</a></li>
                        <li><a href="/shop/view/admin/Manage/brand/brand.php">品牌管理</a></li>
                        <li><a href="/shop/logout.php">注销</a></li>
                    </ul>
                </div>
            </div>
            <?php
        } else {
            ?>
            请 <a href="/shop/admin.php">登陆</a>
            </div>
            <?php
        }
    ?>
</body>
</html>
