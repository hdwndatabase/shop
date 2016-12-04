<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.msg{
			margin-top: 50px;
			padding-left: 128px;
		}
		.ul{
			width:250px;
            height: 150px;
            position: absolute;
            list-style: none;
            left:120px;
            top:165px;
		}
		.ul li{
			margin:20px;
		}
		.ul a{
            text-decoration: none;
            font-size: 20px;
            color:#333399;
            font-weight: 600;
        }
        .ul a:hover{
            color: rgb(128,128,128);
        }
	</style>
</head>
<body style="background: url(/shop/public/images/bg1.jpg);">

</body>
</html><?php
    session_start();
    require_once '../../conf/db.php';
    require_once '../../public/header.php';
    require_once './info/infolist.html';
?>



