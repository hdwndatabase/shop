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
            list-style: none;
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
    require_once '../../../../public/header_admin.php';
    require_once '../../../../conf/db.php';
    if (@$_GET['a']!=='add') {
?>
<div id="back">
        <a href="brand.php?a=add">添加品牌</a><br><br>
        <a href="/shop/admin.php">返回</a><br><br>
        </div>
<?php
        $result = $db->query("SELECT * FROM brand");
        $num = $result->num_rows;
?>

<div id="table">
<table border="1px">
    <tr>
        <td width="70" height="27">品牌ID</td>
        <td width="70">品牌名称</td>
        <td width="50">操作</td>
    </tr>
    <?php
        $i = 1;
        while($brand = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$i."</td><td>".$brand['name']."</td>";
            $i++;
            ?>
            <td><a href=delete.php?id=<?php echo $brand['id']; ?>>删除</a></td>
            <?php
        }
        echo "</table>";
    } else {
       require_once 'add.php';
    }
?>
</div>