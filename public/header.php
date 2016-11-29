<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<div class="header">
    <div class="top">
        欢迎来到<a href="/shop/index.php">网上商城</a>,
    </div>
    <?php
    if (isset($_SESSION['user'])) {
        echo $_SESSION['user'];
        ?>
        <div class="sth">
            <a href="/shop/index.php">主页</a> |
            <a href="/shop/order.php">我的订单</a> |
            <a href="/shop/cart.php" class="shopcart">我的购物车(<span id="num"><?php
                    $name = $_SESSION['user'];
                    $result = $db->query("SELECT sum(good_count) AS total FROM user INNER JOIN shopcart ON user.id = shopcart.user_id WHERE name='$name'");
                    $result = $result->fetch_assoc();
                    echo $result['total']===null ? 0:$result['total'];
                    ?></span>)</a> |
            <a href="/shop/view/user/userinfo.php">我的OnlineMall</a> |
            <a href="/shop/logout.php">注销</a>
        </div><br>
        <?php
    } else {
        ?>
        <div class="login_register">

            请 <a href="/shop/login.php">登陆</a> 或
            <a href="/shop/register.php">注册</a>

            <a href="/shop/cart.php" class="shopcart">购物车(<span id="num"><?php
                    if (isset($_SESSION['cart'])) {
                        $quantity_col = array_column($_SESSION['cart'], 'quantity');
                        $sum = 0;
                        foreach ($quantity_col as $quantity) {
                            $sum += $quantity;
                        }
                        echo $sum;
                    } else {
                        echo 0;
                    }
                    ?></span>)</a>
        </div>
        <?php
    }
    ?>

    <hr>
</div>
</body>
</html>
