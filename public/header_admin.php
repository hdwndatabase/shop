
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        *{
            padding: 0px;
            margin:0px;
        }
        .header{
            width:100%;
            height:33px;
            background: url(/shop/public/images/background.gif) repeat-x;
            border-style: solid;
            border-color: red;
            font-weight: 700;
            font-family: 微软雅黑;
            font-size: 18px;
            line-height: 31px;
        }
    </style>
</head>
<body>
<div class="header">
    欢迎你，管理员:
    <?php
        if (isset($_SESSION['admin'])) {
            echo $_SESSION['admin'];
            ?>
            <?php
        } else {
            ?>
            请 <a href="/shop/admin.php">登陆</a>
            <?php
        }
    ?>
</div>
            <div class="sth">
                <a href="/shop/admin.php">管理员主页</a> |
                <a href="/shop/view/admin/Manage/good/good.php">商品管理</a> |
                <a href="/shop/view/admin/Manage/category/category.php">分类管理</a> |
                <a href="/shop/view/admin/Manage/brand/brand.php">品牌管理</a> |
                <a href="/shop/logout.php">注销</a>
            </div>
</body>
</html>