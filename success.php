<?php
//完成订单信息的录入
session_start();
require_once 'conf/db.php';
require_once 'public/header.php';

$userid = $db->query("SELECT id FROM user WHERE name='" . $_SESSION['user'] . "'");
$userid = $userid->fetch_assoc();
$userid = $userid['id'];

$total_price = $db->query("SELECT sum(good_count*price) AS total_price FROM shopcart INNER JOIN good ON shopcart.good_id=good.id WHERE user_id='$userid'");
$total_price = $total_price->fetch_assoc();
$total_price = $total_price['total_price'];

$name = addslashes($_POST['name']);
$phone = addslashes($_POST['phone']);
$addr = addslashes($_POST['addr']);
$zipcode = addslashes($_POST['zipcode']);

$time = $db->query("SELECT now() AS ctime");
$time = $time->fetch_assoc();
$time = $time['ctime'];

$id = $db->query("SELECT count(*)+1 AS id FROM `order`");
$id = $id->fetch_assoc();
$id = $id['id'];

$db->query("INSERT INTO `order` VALUES ('$id','$userid','$name','$addr','$phone','$zipcode','$time','1','$total_price')");

$result = $db->query("SELECT DISTINCT good_id,good_count,price*good_count AS price FROM shopcart INNER JOIN good ON shopcart.good_id=good.id WHERE user_id='$userid'") or die("订单处理错误");

while ($r = $result->fetch_assoc()) {
    $good_id = $r['good_id'];
    $good_count = $r['good_count'];
    $price = $r['price'];

    $db->query("UPDATE good SET sale_count=sale_count+'$good_count',store_count=store_count-'$good_count' WHERE id='$good_id'");
    $db->query("INSERT INTO order_detail VALUE ('$id','$good_id','$good_count','$price')") or die("订单处理错误");
}

$db->query("DELETE FROM shopcart WHERE user_id='$userid'") or die("清空购物车失败");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		h2{
			margin-top: 50px;
			margin-left: 200px;
		}
	</style>
</head>
<body style="background: url(/shop/public/images/bg1.jpg);">
    <h2>订单提交成功！你的包裹将尽快发货</h2>
</body>
</html>
