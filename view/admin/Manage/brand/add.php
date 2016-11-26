<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        #brand{
            width: 30%;
            font-size: 25px;
            font-family: 楷体;
            margin-left: 240px;
            margin-top: 50px;
            color:#B00000;
        }
        #brand .pinpai{
            float: left;
        }
        #brand .tianjia{
            float: left;
        }
        input[type="text"]{
            width:150px;
            height: 25px;
            margin-left: 10px;
        }
        input[type="submit"]{
            width:60px;
            height: 30px;
            margin-left: 5px;
            margin-bottom: 30px;
        }
        #brand a{
            text-decoration: none;
        }
        #brand form{
            margin-bottom: 40px;
        }
        #brand .abc{
            margin-top:25px; 
        }
    </style>
</head>
<body>

</body>
</html>
<?php
    if (@empty($_POST['brand'])) {
?>
<div id="brand">
        <form action="add.php?a=add" method="post">
            <div class="pinpai">品牌<input type="text" name="brand"></div>
            <div class="tianjia"><input type="submit" value="添加"></div>
        </form>
        <br>
        <p class="abc"><a href="brand.php">返回</a></p>
</div>
<?php
    } else {
        require_once '../../../../conf/db.php';
        $brand = @addslashes($_POST['brand']);
        $result = $db->query("SELECT * FROM brand WHERE name='$brand'");
        if ($result->num_rows) {
            echo "<h2>插入错误！品牌已存在</h2>";
            echo "<br><a href='brand.php?a=add'>返回</a>";
        } else {
            $result = $db->query("SELECT MAX(id)+1 FROM brand");
            $arr = $result->fetch_array();
            if ($arr['MAX(id)+1']===null) {
                echo "Here";
                $db->query("INSERT INTO brand VALUES (1,'$brand')") or die("插入失败");
            } else {
                $num = $arr[0];
                $db->query("INSERT INTO brand VALUES ('$num','$brand')") or die("插入失败");
            }
            echo "<h2>插入成功！</h2>";
            echo "<br><a href='brand.php'>返回</a>";
        }
    }
?>