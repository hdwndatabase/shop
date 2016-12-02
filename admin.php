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
        #ul{
            list-style: none;
            width:250px;
            height: 150px;
            position: absolute;
            left:120px;
            top:120px;
        }
        #ul li{
            list-style: none;
            margin:20px;
        }
        #ul a{
            text-decoration: none;
            font-size: 20px;
            color:990033;
            font-weight: 600;
        }
        #ul a:hover{
            color: rgb(128,128,128);
        }
                *{
            padding: 0px;
            margin:0px;
        }
        .header{
            width:100%;
            height:33px;
            background: url(/shop/public/images/background.gif) repeat-x;
            font-weight: 700;
            font-family: 微软雅黑;
            font-size: 18px;
            line-height: 31px;
            padding-left: 30px;
        }
        .blank{
            width:100%;
            height:33px;
        }
        .sth{
            width:1202px;
            height:49px;
            margin:0 auto;
        }
        .sth .guanliyuanxuanxiang{
            width:260px;
            height:49px;
            background: url(/shop/public/images/quanbushangpinfenlei.bmp) repeat-x;
            float:left;
        }
        .sth .guanliyuanxuanxiang p{
            text-align: center;
            line-height: 49px;
            font-family: 微软雅黑;
            color:white;
            font-size:17px;
        }
        .sth .list{
            width:942px;
            height:49px;
            float:left;
        }
        .sth .list li a{
            width:157px;
            height:49px;
            float:left;
            line-height: 49px;
            background: rgb(239,239,239);
            font-size: 16px;
            text-align: center;
            display: block;
            font-family: 微软雅黑;
            text-decoration: none;
        }
        .sth .list li a:hover{
            background: rgb(229,230,230);
        }
    </style>
</head>
<body>

</body>
</html>
<?php
    session_start();
    require_once './public/header_admin.php';
    if (!isset($_SESSION['admin'])) {
        require_once './view/public/login_admin.html';
        require_once './conf/db.php';
        if (!empty(@$_POST['username'] && !empty(@$_POST['password']))) {
            @$username = addslashes($_POST['username']);
            @$password = addslashes($_POST['password']);

            $result = $db->query("SELECT * FROM admin WHERE name='$username' AND pwd=md5('$password')") or die("查询无果");
            $row = $result->fetch_assoc();
            if ($result->num_rows) {
                $_SESSION['admin'] = $row['name'];
                header('Location: ./admin.php');
            } else {
                echo "<script>alert('登录失败！请重新填写信息')</script>";
            }
        }
    } else {
        require_once './view/admin/adminPage.php';
    }
?>
