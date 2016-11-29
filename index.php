<!DOCTYPE html>
<html>
<head>
	<title></title>
    <style type="text/css">
    	*{
    		margin:0px;
    		padding:0px;
    	}
        a{
            text-decoration: none;
            color: rgb(128,128,128);
        }
        .header{
            height: 150px;
        }
        .sth{
            width:940px;
            height: 49px;
            margin:auto;
        }
        .sth a{
            width:188px;
            height:49px;
            float:left;
            line-height: 49px;
            background: rgb(239,239,239);
            font-size: 16px;
            text-align: center;
            display: block;
            font-family: 微软雅黑;
        }
        .sth a:hover{
            background: rgb(229,230,230);
        }
        .login_register{
            margin-left: 70px;
        }
        .top{
            width:100%;
            height:33px;
            background: url(/shop/public/images/background.gif) repeat-x;
            font-size: 25px;
            font-weight: 600;
            padding-left: 70px;
            text-align: middle;
        }
        .search{
        	padding-left: 100px;
        }
    </style>
</head>
<body style="background: url(/shop/public/images/bg1.jpg);">

</body>
</html>
<?php
    session_start();
    if(@empty($_SESSION['cart'])|count(@$_SESSION['cart'])===0) {
        $_SESSION['cart'] = array();
    }
    require_once 'conf/db.php';
    require_once 'public/header.php';
    require_once 'view/public/search/search_field.php';
    require_once 'view/user/display_index.php';
