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
        width:400px;
        height:350px;
        padding-left: 30px;
        padding-top: 40px;
        position: relative;
        left:80px;
        top:60px;
    }
    .form .pwd input[type="password"]{
        margin: 18px;
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
        margin-left: 64px;
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
        margin-top: 13px;
        margin-bottom: 50px;
        text-align: center;
    }
    .form #wangjimima {
        width:150px;
        margin-left: 150px;
        font-size: 15px;
        text-decoration: none;
    }
    .form form div{
        font-style: 微软雅黑;
        font-size: 20px;
    }
    </style>
    <script src="/shop/public/js/jquery-3.1.1.js"></script>
</head>
<body style="background: url(/shop/public/images/bg1.jpg);">

</body>
</html>
<?php
    session_start();
require_once './conf/db.php';
require_once './public/header.php';
if (isset($_SESSION['user'])) {
        echo "<script>history.go(-1)</script>";
    } else {
        if (!empty(@$_POST['username'] && !empty(@$_POST['password']))) {
            @$username = addslashes($_POST['username']);
            @$password = addslashes($_POST['password']);

            $result = $db->query("SELECT * FROM user WHERE name='$username' AND pwd=md5('$password')");
            $row = $result->fetch_assoc();
            if ($result->num_rows) {
                $_SESSION['user'] = $row['name'];
                header('Location: ./login.php');
            } else {
                echo "<script>alert('登录失败！请重新填写信息')</script>";
            }
        }
    require_once './view/public/login.html';
    }
?>


