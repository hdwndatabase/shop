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
        .top{
            width:100%;
            height:33px;
            background: url(/shop/public/images/background.gif) repeat-x;
            font-size: 25px;
            font-weight: 600;
            padding-left: 70px;
            text-align: middle;
        }
        .login_register{
            margin-left: 70px;
        }
    .form{
        height:350px;
        padding-left: 30px;
        padding-top: 40px;
        position: relative;
        left:80px;
        top:60px;
    }
    .form input[type="text"]{
        width:260px;
        height:37px;
        margin-bottom: 0px;
        margin-top: 7px;
    }
    .form input[type="password"]{
        width:260px;
        height:37px;
        margin-bottom: 5px;
        margin-top: 7px;
    }
    .form input[type="submit"]{
        width:270px;
        height:42px;
        vertical-align: middle;
        line-height:41px;
        font-size:17px;
        margin-left: 0px;
        width:270px;
        height: 42px;
        font-weight: 700;
        color: #fff;
        background: #f40;
        border-radius: 3px;
        cursor: pointer;
        zoom:  1;
        margin-bottom: 50px;
        text-align: center;
    }
    .form #wangjimima {
        float: right;
        width:150px;
        margin-left: 150px;
        font-size: 15px;
        text-decoration: none;
        margin-top: 10px;
    }
    .form .submit{
        width:280px;
        height: 50px;
    }
    </style>
</head>
<body style="background: url(/shop/public/images/bg1.jpg);">

</body>
</html>
<?php
    session_start();
    require_once './public/header.php';
    if (isset($_SESSION['user'])) {
        echo "<h2 class='msg'>欢迎你,".$_SESSION['user']."</h2>";
    } else {
        require_once './conf/db.php';
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


