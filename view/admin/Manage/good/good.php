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
        #table{
            width:57%;
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
<a href="good.php?a=add">添加商品</a><br><br>
<a href="/shop/admin.php">返回</a><br><br>
</div>
<?php
    $result = $db->query("SELECT * FROM good");
    $num = $result->num_rows;
?>

<form action="">

</form>
<div id="table">
<table border="1px">
    <tr class="title">
        <td width="80" height="28">商品ID</td>
        <td>商品名称</td>
        <td width="50">价格</td>
        <td width="80">品牌</td>
        <td width="50">分类</td>
        <td width="50">库存</td>
        <td width="50">销量</td>
        <td width="80">商品图片</td>
        <td width="120">操作</td>
    </tr>
    <?php
        $i=1;
        while($good = $result->fetch_assoc()) {
            $brand_id = $good['brand_id'];
            $category_id = $good['category_id'];

            $result1 = $db->query("SELECT name FROM brand WHERE id='$brand_id'");
            $brand = $result1->fetch_assoc();
            $brand = $brand['name'];

            $result1 = $db->query("SELECT name FROM category WHERE id='$category_id'");
            $category = $result1->fetch_assoc();
            $category = $category['name'];

            echo "<tr>";
            echo "<td>".$i."</td><td>".$good['name']."</td>";
            echo "<td>".$good['price']."</td><td>".$brand."</td>";
            echo "<td>".$category."</td><td>".$good['store_count']."</td>";
            echo "<td>".$good['sale_count']."</td>";
        ?>
            <td><a href="view_img.php?name=<?php echo $good['img_name']; ?>">点此查看</a></td>
    <?php

            $i++;
            ?>
            <td><a href=delete.php?id=<?php echo $good['id']; ?>>删除</a>
                <a href="modify.php?id=<?php echo $good['id']; ?>">修改信息</a>

            <?php
        }
        echo "</table>";
        } else {
        require_once 'add.php';
    }
    ?>
</div>