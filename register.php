<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
        }

        a {
            text-decoration: none;
            color: rgb(128, 128, 128);
        }

        .header {
            height: 150px;
        }

        .sth {
            width: 940px;
            height: 49px;
            margin: auto;
        }

        .sth a {
            width: 188px;
            height: 49px;
            float: left;
            line-height: 49px;
            background: rgb(239, 239, 239);
            font-size: 16px;
            text-align: center;
            display: block;
            font-family: 微软雅黑;
        }

        .sth a:hover {
            background: rgb(229, 230, 230);
        }

        .login_register {
            margin-left: 70px;
        }

        .top {
            width: 100%;
            height: 33px;
            background: url(/shop/public/images/background.gif) repeat-x;
            font-size: 25px;
            font-weight: 600;
            padding-left: 70px;
            text-align: middle;
        }

        .form {
            width: 350px;
            height: 400px;
            padding-top: 30px;
            padding-right: 20px;
        }

        .form form input {
            width: 260px;
            height: 25px;
            margin-top: 5px;
        }

        .form .submit input[type="submit"] {
            width: 260px;
            height: 40px;
            line-height: 41px;
            font-size: 17px;
            margin-left: 20px;
            width: 270px;
            height: 42px;
            font-weight: 700;
            color: #fff;
            background: #f40;
            border-radius: 3px;
            cursor: pointer;
            zoom: 1;
            margin-bottom: 50px;
            text-align: center;
            margin-left: 30px;
        }
    </style>
</head>
<body style="background: url(/shop/public/images/bg1.jpg);">

</body>
</html>
<?php
require_once './conf/db.php';
require_once './public/header.php';
session_start();
if (isset($_SESSION['registered'])) {
    $_SESSION = array();
    session_destroy();
    echo "<h2 class='msg'>注册成功！请<a href='./login.php' class='login_link'>登陆</a></h2>";
} else {
    if (!empty($_POST["username"]) && !empty($_POST["pwd"]) &&
        !empty($_POST["tel"]) && !empty($_POST["email"])
    ) {
        @$username = addslashes($_POST["username"]);
        @$pwd = addslashes($_POST["pwd"]);
        @$tel = addslashes($_POST["tel"]);
        @$email = addslashes($_POST["email"]);

        $result = $db->query("SELECT * FROM user WHERE name='$username'");
        if ($result->num_rows) {
            echo "<p class='ref_fail'>注册失败!用户名已存在<p>";
            header('Location: ./view/user/logfail.php');
            exit;
        }

        $result = $db->query("SELECT COUNT(*)+1 FROM user");
        $arr = $result->fetch_array();
        $count = $arr[0];
        $db->query("INSERT INTO user (id,name,pwd,phone,email) VALUE ('$count','$username',md5('$pwd'),'$tel','$email')") or die('注册失败');
        $_SESSION['registered'] = true;
        header('Location: ./view/user/logsuc.php');
    }
    require_once './view/user/reg.html';
}
?>


