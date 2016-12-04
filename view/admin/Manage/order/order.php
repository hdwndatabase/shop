<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
    *{
        padding:0px;
        margin:0px;
        list-style: none;
        text-decoration: none;
    }
    .all{
        width:100%;
        height:605px;
        background: url(background.jpg) repeat;
    }
    .form{
        height:350px;
        padding-left: 30px;
        padding-top: 40px;
        position: relative;
        left:80px;
        top:60px;
    }
    .form input[type="text"]{
        width:260px;
        height:37px;
        margin-bottom: 25px;
        margin-top: 7px;
    }
    .form input[type="password"]{
        width:260px;
        height:37px;
        margin-bottom: 25px;
        margin-top: 7px;
    }
    .form input[type="submit"]{
        margin-left: 9px;
        width:270px;
        height: 42px;
        border: 0;
        display: inline-block;
        overflow: hidden;
        vertical-align: middle;
        line-height: 42px;
        font-size: 16px;
        font-weight: 700;
        color: #fff;
        background: #f40;
        border-radius: 3px;
        cursor: pointer;
        zoom:  1;
        margin-bottom: 50px;
        text-align: center;
    }
    .form #wangjimima {
        float: right;
        width:150px;
        margin-left: 150px;
        font-size: 15px;
        text-decoration: none;
    }
    .form form div{
        font-style: 微软雅黑;
        font-size: 20px;
    }
        #ul{
            list-style: none;
            width:250px;
            height: 150px;
            position: absolute;
            left:120px;
            top:120px;
        }
        #ul .ul ul{
            margin-bottom: 15px;
        }
        #ul li{ 
            list-style: none;
            margin:20px;
        }
        #ul a{
            text-decoration: none;
            font-size: 20px;
            color:990033;
            font-weight: 600;
        }
        #ul a:hover{
            color: rgb(128,128,128);
        }
                *{
            padding: 0px;
            margin:0px;
        }
        .header{
            width:100%;
            height:33px;
            background: url(/shop/public/images/background.gif) repeat-x;
            font-weight: 700;
            font-family: 微软雅黑;
            font-size: 18px;
            line-height: 31px;
            padding-left: 30px;
        }
        .blank{
            width:100%;
            height:33px;
        }
        .sth{
            width:1202px;
            height:49px;
            margin:0 auto;
        }
        .sth .guanliyuanxuanxiang{
            width:260px;
            height:49px;
            background: url(/shop/public/images/quanbushangpinfenlei.bmp) repeat-x;
            float:left;
        }
        .sth .guanliyuanxuanxiang p{
            text-align: center;
            line-height: 49px;
            font-family: 微软雅黑;
            color:white;
            font-size:17px;
        }
        .sth .list{
            width:942px;
            height:49px;
            float:left;
        }
        .sth .list li a{
            width:157px;
            height:49px;
            float:left;
            line-height: 49px;
            background: rgb(239,239,239);
            font-size: 16px;
            text-align: center;
            display: block;
            font-family: 微软雅黑;
            text-decoration: none;
        }
        .sth .list li a:hover{
            background: rgb(229,230,230);
        }
        .table{
            padding-left: 350px;
            padding-top: 25px;
        }
    </style>
</head>
<body>

</body>
</html>
<script src="/shop/public/js/jquery-3.1.1.js"></script>
<script src="/shop/public/js/send.js"></script>
<?php
session_start();
require_once '../../../../conf/db.php';
require_once '../../../../public/header_admin.php';
?>
<div id="ul">
<li class="ul">
    <ul><a href="/shop/view/admin/Manage/order/order.php">全部</a></ul>
    <ul><a href="/shop/view/admin/Manage/order/order.php?status=1">待发货</a></ul>
    <ul><a href="/shop/view/admin/Manage/order/order.php?status=2">已发货</a></ul>
    <ul><a href="/shop/view/admin/Manage/order/order.php?status=3">已收货</a></ul>
</li>
</div>
<?php

$query_str = "SELECT * FROM `order`";
$appendix = '';

@$status = addslashes($_GET['status']);
if (@isset($status)) {
    switch (@$status) {
        case '1':
            $appendix = " WHERE state='1'";
            break;
        case '2':
            $appendix = " WHERE state='2'";
            break;
        case '3':
            $appendix = " WHERE state='3'";
            break;
        default:
            $appendix = '';
            break;
    }
}

//获取用户订单
$result = $db->query($query_str . $appendix);
while ($order = $result->fetch_assoc()) {
    ?>
    <div class="table">
    <table border="1px">
        <tr>
            <td colspan="2">订单号:<?php echo $order['id'] . "  "; ?> 下单时间:<?php echo $order['datetime'] . "  "; ?>
                订单状态:<?php switch ($order['state']) {
                    case '1':
                        echo '待发货';
                        break;
                    case '2':
                        echo '已发货';
                        break;
                    case '3':
                        echo '已收货';
                        break;
                    default:
                        echo '未知状态';
                        break;
                } ?></td>
        </tr>
        <?php
        $result2 = $db->query("SELECT order_detail.*,concat(brand.name,' ',good.name) AS title FROM order_detail INNER JOIN good ON order_detail.good_id = good.id INNER JOIN brand ON good.brand_id = brand.id WHERE order_detail.order_id='" . $order['id'] . "'");
        while ($each_detail = $result2->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $each_detail['title'] . "  x" . $each_detail['good_count']; ?></td>
                <td><?php echo $each_detail['price'] . "元"; ?></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td colspan="2">合计: <?php echo $order['total_price']; ?>元</td>
        </tr>
        <tr>
            <td colspan="2">收件人信息:</td>
        </tr>
        <tr>
            <td colspan="2"><?php echo $order['name'] . "  (收)   " . $order['phone']; ?>
                <br><?php echo $order['addr'] . "   " . $order['zipcode']; ?></td>
        </tr>
        <tr class="send">
            <td colspan="2">
                <?php
                if($order['state']=='1') {
                    echo "<button class='send' id='".$order['id']."'>发货"."</button>";
                } else if($order['state']=='3') {
                    echo "<button class='del' id='".$order['id']."'>删除订单"."</button>";
                }
                ?>
            </td>
        </tr>
    </table>
    </div>
    <?php
}
?>
