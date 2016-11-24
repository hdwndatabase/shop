<?php
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        欢迎来到OnlineMall,
        <?php
        if (isset($_SESSION['user'])) {
            echo $_SESSION['user'];
        ?>
            <div class="sth">
                <a href="/shop/index.php">主页</a> |
                <a href="/shop/view/user/order.php">我的订单</a> |
                <a href="/shop/view/user/shopcart.php">我的购物车</a> |
                <a href="/shop/view/user/userinfo.php">我的OnlineMall</a> |
                <a href="/shop/logout.php">注销</a>
            </div>
        <?php
        } else {
        ?>
            请 <a href="/shop/login.php">登陆</a> 或
            <a href="/shop/register.php">注册</a>
        <?php
        }
        ?>

        <hr>
    </div>
</body>
</html>
