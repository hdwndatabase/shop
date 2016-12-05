<!DOCTYPE html>
<html>
<head>
	<title></title>
    <style type="text/css">
    h2{
    	margin-top: 50px;
    	margin-left: 200px;
    }
    p{
    	font-family: 楷体;
    	font-size: 22px;
    	font-weight: 600;
    	margin-left: 450px;
    	margin-top: 15px;
    }
    </style>
</head>
<body  style="background: url(/shop/public/images/bg1.jpg);">

</body>
</html>
<?php
    session_start();
    require_once '../../../../conf/db.php';
    require_once '../../../../public/header.php';
?>
<h2>原密码错误，请重新输入</h2>
<p><a href="/shop/view/user/info/modify/modifyUserinfo.php">返回</a></p>
