<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        #good{
            width: 30%;
            margin-left: 300px;
            margin-top: 35px;
            font-family: 楷体;
            font-size: 20px;
        }
        #good input[type="text"]{
            width:200px;
            height: 25px;
            margin-left: 10px;
        }
        #good select{
            width:60px;
            height: 25px;
            margin-left: 15px;
        }
        #good input[type="submit"]{
            width:60px;
            height: 30px;
            margin-left: 15px;
            font-family: 楷体;
            color:black;
        }
        #good input[type="file"]{
            width:200px;
            height: 20px;
            font-family: 楷体;
        }
    </style>
</head>
<body>

</body>
</html>
<?php
    require_once '../../../../conf/db.php';
    if (@empty($_POST['good'])) {
        ?>
        <div id="good">
        <form action="add.php?a=add" method="post" enctype="multipart/form-data">
            <div>商品名称<input type="text" name="good"></div><br>
            <div>商品价格<input type="text" name="price"></div><br>
            <div>品牌<select name="brand">
                <?php
                    $result = $db->query("SELECT * FROM brand");
                    while($brand = $result->fetch_assoc()) {
                        echo "<option value=".$brand['id'].">".
                            $brand['name']."</option>";
                    }

                ?>
                    </select>
            </div><br>
            <div>分类<select name="category">
                    <?php
                        $result = $db->query("SELECT * FROM category");
                        while($category = $result->fetch_assoc()) {
                            echo "<option value=".$category['id'].">".
                                $category['name']."</option>";
                        }
                    ?>
                </select>
            </div><br>
            <div>库存<input type="text" name="store_count"></div><br>
            (可选)上传商品图片<br>
            <div><input type="file" name="img"></div><br>
            <div><input type="submit" value="提交"></div>
        </form><br>
        <p class="abc"><a href="good.php">返回</a></p></div>
        <?php
    } else {
        if ($_FILES['img']['name'] !== "") {
            $file = @$_FILES['img'];
            @$img_name = $file['name'];
            $upload_path = "C:\\wamp\\Apache24\\htdocs\\shop\\public\\images\\".$img_name;
            if (@strpos($file['type'],"image") === false) {
                echo "<script>alert('请上传图片！')</script>";
                exit;
            }
            if (!move_uploaded_file($file['tmp_name'],$upload_path)) {
                echo "<script>alert('上传失败！')</script>";
                exit;
            }
        }

        $good = @addslashes($_POST['good']);
        $brand = @addslashes($_POST['brand']);
        $price = @addslashes($_POST['price']);
        $category = @addslashes($_POST['category']);
        $store_count = @addslashes($_POST['store_count']);
        $result = $db->query("SELECT * FROM good WHERE name='$good' AND brand_id='$brand'");
        if (@$result->num_rows) {
            echo "<h2>插入错误！商品已存在</h2>";
            echo "<br><a href='good.php?a=add'>返回</a>";
        } else {
            $result = $db->query("SELECT MAX(id)+1 FROM good");
            $arr = $result->fetch_array();
            if ($arr['MAX(id)+1']===null) {//当前表中没有信息
                if (isset($img_name)) {//插入了图片
                    $db->query("INSERT INTO good VALUES (0,'$good','$price','$brand','$category','$store_count',0,'$img_name')") or die("插入失败");
                } else {//未插入图片
                    $db->query("INSERT INTO good VALUES (0,'$good','$price','$brand','$category','$store_count',0,NULL)") or die("插入失败");
                }
            } else {
                $count = $arr[0];
                if (isset($img_name)) {
                    $db->query("INSERT INTO good VALUES ('$count','$good','$price','$brand','$category','$store_count',0,'$img_name')") or die("插入失败");
                } else {
                    $db->query("INSERT INTO good VALUES ('$count','$good','$price','$brand','$category','$store_count',0,NULL)") or die("插入失败");
                }
            }

            echo "<h2>插入成功！</h2>";
            echo "<br><a href='good.php'>返回</a>";
        }
    }
?>