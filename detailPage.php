<?php
session_start();
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
    <script src="/shop/public/js/num_button.js"></script>
</head>
<body>
<div class="good_main">
    <!--商品图片-->
    <div class="pic left">
        <img src="/shop/public/images/<?php echo $good['img_name'];?>" alt="<?php echo $good['brandName']." ".$good['goodName'];?>">
    </div>
    <!--商品信息-->
    <div class="info right">
        <!--        标题-->
        <div class="title">
            <h2><?php echo $good['brandName']." ".$good['goodName'];?></h2>
        </div>
        <!--        价格-->
        <div class="price">
            <span>价格:<?php echo $good['price'];?></span>
        </div>
        <!--        销量-->
        <div class="sales">
            <span>销量:<?php echo $good['sale_count'];?></span>
        </div>
        <!--        购买数量-->
        <div class="num">
            <div>
                <span>购买数量:</span>
                <button id="minus">-</button>
                <input type="number" id="num">
                <button id="plus">+</button>
            </div>
        </div>
        <!--        加入购物车-->
        <div class="addcart">
            <a href="">加入购物车</a>
        </div>
    </div>
</div>
</body>
</html>