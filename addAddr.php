<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
    <script src="/shop/public/js/jquery-3.1.1.js"></script>
    <script src="/shop/public/js/sendAddr.js"></script>
</head>
<body>

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: lvhao
 * Date: 2016/11/27
 * Time: 17:44
 */
session_start();
require_once 'conf/db.php';
require_once 'public/header.php';
if(!isset($_SESSION['user'])) {
    header('Location: login.php');
} else {
    require_once 'view/user/order/addAddr.html';
}