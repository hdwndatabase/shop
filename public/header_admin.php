<!--注释-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="header">
    欢迎你，管理员:
    <?php
        if (isset($_SESSION['admin'])) {
            echo $_SESSION['admin'];
            ?>
            <div class="sth">
                <a href="/shop/admin.php">管理员主页</a> |
                <a href="/shop/view/admin/Manage/good/good.php">商品管理</a> |
                <a href="/shop/view/admin/Manage/category/category.php">分类管理</a> |
                <a href="/shop/view/admin/Manage/brand/brand.php">品牌管理</a> |
                <a href="/shop/logout.php">注销</a>
            </div>
            <?php
        } else {
            ?>
            请 <a href="/shop/admin.php">登陆</a>
            <?php
        }
    ?>

    <hr>
</div>
</body>
</html>
