<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        li{
            list-style: none;
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
            list-style: none;
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
        #back{
            width: 100px;
            margin-left: 240px;
            margin-top: 20px;
        }
        #back a{
            text-decoration: none;
            font-weight: 800;
            font-size: 20px;
            color:#006600;
            font-family: 楷体;
        }
        #back a:hover{
            color:rgb(128,128,128);
        }
        #table table .title td{
            font-size: 18px;
            font-weight: 600;
        }
        #table table td{            
            text-align: center;
            vertical-align: middle;
        }
        #table{
            width:19%;
            margin-left: 240px;
        }
        #table a{
            text-decoration: none;
            color:#CC9933;
            font-weight: 600;
        }
        #table a:hover{
            color:#FFCC33;
        }
    </style>
</head>
<body>

</body>
</html>
<?php
    session_start();
    require_once '../../../../conf/db.php';
    require_once '../../../../public/header_admin.php';

    if (@$_GET['m']=='yes' && @isset($_GET['id'])) {
        $id = addslashes($_GET['id']);
       $name = addslashes($_POST['name']);
       $price = addslashes($_POST['price']);
       $store = addslashes($_POST['store']);
       $sale_count = addslashes($_POST['sale_count']);
       $category = addslashes($_POST['category']);
       $brand = addslashes($_POST['brand']);

        $db->query("UPDATE good SET name='$name',price='$price',
      store_count='$store',sale_count='$sale_count',category_id='$category',
      brand_id='$brand' WHERE id='$id'") or die("修改失败");
        echo "<h2>修改成功</h2>";
        echo "<a href='good.php'>返回</a>";
    } else {
        $id = addslashes($_GET['id']);
        $result = $db->query("SELECT * FROM good WHERE id='$id'");
        $old = $result->fetch_assoc();

        $cat_id = $old['category_id'];
        $brand_id = $old['brand_id'];

        require_once 'modify.html';
    }


?>
