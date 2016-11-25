<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
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
            width:1200px;
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
        width:940px;
        height:49px;
        float:left;
    }
    .sth .list li a{
        width:188px;
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
<body style="background: url(/shop/public/images/bg1.jpg);">
<div class="header">
    欢迎你，管理员:
    <?php
        if (isset($_SESSION['admin'])) {
            echo $_SESSION['admin'];
            ?>
            <?php
        } else {
            ?>
            请 <a href="/shop/admin.php">登陆</a>
            <?php
        }
    ?>
</div>

<div class="blank">
    
</div>
            <div class="sth">
                <div class="guanliyuanxuanxiang"><p>管理员选项</p></div>
                <div class="list">
                   <ul>
                    <li><a href="/shop/admin.php">管理员主页</a> </li>
                    <li><a href="/shop/view/admin/Manage/good/good.php">商品管理</a></li>
                    <li><a href="/shop/view/admin/Manage/category/category.php">分类管理</a></li>
                    <li><a href="/shop/view/admin/Manage/brand/brand.php">品牌管理</a></li>
                    <li><a href="/shop/logout.php">注销</a></li>
                    </ul> 
                </div>
                               
            </div>
</body>
</html>