<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
    <div class="top">
        欢迎来到<a href="/shop/index.php">网上商城</a>,</div>
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
            </div><br>
        <?php
        } else {
        ?>
        <div class="login_register">
        
            请 <a href="/shop/login.php">登陆</a> 或
            <a href="/shop/register.php">注册</a>
        </div>
        <?php
        }
        ?>

        <hr>
    </div>
</body>
</html>
