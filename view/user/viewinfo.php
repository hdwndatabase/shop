<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .h{
            margin-top: 50px;
            padding-left: 168px;
        }
        .table{
            margin-top: 30px;
            margin-left: 168px;
            line-height: 30px;
        }
        .table td{
            padding-left: 5px;
            padding-right: 5px;
        }
    </style>
</head>
<body style="background: url(/shop/public/images/bg1.jpg);">

</body>
</html>
<?php
session_start();
require_once '../../conf/db.php';
require_once '../../public/header.php';

$name = $_SESSION['user'];
$result = $db->query("SELECT name,addr,phone,email,zipcode FROM user WHERE name='$name'");
$elems = $result->fetch_assoc();
?>
<h2 class="h">用户个人信息</h2>
<div class="table">
<table border="1px" class="info">
    <tr>
        <td>用户名</td>
        <td><?php echo $elems['name'] ?></td>
    </tr>
    <tr>
        <td>地址</td>
        <td><?php echo $elems['addr'] ?></td>
    </tr>
    <tr>
        <td>手机号码</td>
        <td><?php echo $elems['phone'] ?></td>
    </tr>
    <tr>
        <td>邮箱</td>
        <td><?php echo $elems['email'] ?></td>
    </tr>
    <tr>
        <td>邮编</td>
        <td><?php echo $elems['zipcode'] ?></td>
    </tr>
</table>
</div>