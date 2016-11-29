<?php
session_start();
require_once 'conf/db.php';
require_once 'public/header.php';
@$name = addslashes($_POST['name']);
@$phone = addslashes($_POST['phone']);
@$addr = addslashes($_POST['addr']);
@$zipcode = addslashes($_POST['zipcode']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
    <script src="/shop/public/js/num_button.js"></script>
    <script src="/shop/public/js/confirm.js"></script>
</head>
<body>
    <h2>您的订单将配送到如下地址，是否确认？</h2>
    <table border="1px">
        <tr>
            <td id="name"><span><?php echo $name;?></span> (收)</td>
        </tr>
        <tr>
            <td id="addr">地址: <span><?php echo $addr;?></span></td>
        </tr>
        <tr>
            <td id="phone">联系方式: <span><?php echo $phone;?></span></td>
        </tr>
        <tr>
            <td id="zipcode">邮编: <span><?php echo $zipcode;?></span></td>
        </tr>
    </table>
    <div id="1">
        <p>信息有误？</p>
        <a id="modify" href="/shop/addAddr.php">我要修改</a>
    </div>
    <div id="2">
        <form action="success.php" method="post">
            <input type="hidden" name="name" value="<?php echo $name;?>">
            <input type="hidden" name="addr" value="<?php echo $addr;?>">
            <input type="hidden" name="phone" value="<?php echo $phone;?>">
            <input type="hidden" name="zipcode" value="<?php echo $zipcode;?>">
            <p>确认无误</p>
            <input type="submit" value="提交订单">
        </form>
    </div>
</body>
</html>
