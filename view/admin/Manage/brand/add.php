<?php
    if (@empty($_POST['brand'])) {
?>
        <form action="add.php?a=add" method="post">
            <div>品牌<input type="text" name="brand"></div>
            <div><input type="submit" value="添加"></div>
        </form>
        <br>
        <a href="brand.php">返回</a>
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