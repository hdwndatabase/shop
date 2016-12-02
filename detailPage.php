<?php
session_start();
if(empty($_SESSION['cart'])|count($_SESSION['cart'])===0) {
    $_SESSION['cart'] = array();
}
require_once 'conf/db.php';
require_once 'public/header.php';
require_once 'view/public/search/search_field.php';
require_once 'view/public/search/search.class.php';

$id = addslashes($_GET['goodId']);
$search = new search($db);
$result = $search->search(" WHERE good.id='".$id."'");
$good = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
    <script src="/shop/public/js/jquery-3.1.1.js"></script>
    <script src="/shop/public/js/num_button.js"></script>
    <script src="/shop/public/js/addcart_d.js"></script>
    <style type="text/css">
        .good_main #pic{
            margin-left: 80px;
        }
        .info{
            padding-left: 140px;
            line-height: 40px;
            font-family: 微软雅黑;
        }
        .info #plus{
            width:23px;
            height:23px;
        }
        .info #minus{
            width:23px;
            height:23px;
        }
        .info #num{
            width:40px;
            height:20px;
        }
        #addCart{
            width:100px;
            height:30px;
            font-family: 楷体;
            font-weight: 700;
            font-size: 16px;
        }
    </style>
</head>
<body style="background: url(/shop/public/images/bg1.jpg);">
<div class="good_main">
    <!--商品图片-->
    <div id="pic" class="pic left">
        <img src="/shop/public/images/<?php echo $good['img_name'];?>" alt="<?php echo $good['brandName']." ".$good['goodName'];?>">
    </div>
    <!--商品信息-->
    <div class="info right" id="<?php echo $good['id'];?>">
        <!--        标题-->
        <div class="title">
            <h2><?php echo $good['brandName']." ".$good['goodName'];?></h2>
        </div>
        <!--        价格-->
        <div class="price">
            价格:<span><?php echo $good['price'];?></span>
        </div>
        <!--        销量-->
        <div class="sales">
            销量:<span><?php echo $good['sale_count'];?></span>
        </div>
        <!--        购买数量-->
        <div class="num">
            <div>
                <span>购买数量:</span>
                <button id="minus">-</button>
                <input type="text" id="num">
                <button id="plus">+</button>
            </div>
        </div>
        <!--        加入购物车-->
        <div class="addcart">
            <button id="addCart">加入购物车</button>
        </div>
    </div>
</div>
</body>
</html>