<?php
    if (@empty($_POST['category'])) {
        ?>
        <form action="add.php?a=add" method="post">
            <div>分类名称<input type="text" name="category"></div>
            <div><input type="submit" value="添加"></div>
        </form>
        <br>
        <a href="category.php">返回</a>
        <?php
    } else {
        require_once '../../../../conf/db.php';
        $category = @addslashes($_POST['category']);
        $result = $db->query("SELECT * FROM category WHERE name='$category'");
        if ($result->num_rows) {
            echo "<h2>插入错误！品牌已存在</h2>";
            echo "<br><a href='category.php?a=add'>返回</a>";
        } else {
            $result = $db->query("SELECT COUNT(*)+1 FROM category");
            $arr = $result->fetch_array();
            $count = $arr[0];
            $db->query("INSERT INTO category VALUES ('$count','$category')");
            echo "<h2>插入成功！</h2>";
            echo "<br><a href='category.php'>返回</a>";
        }
    }
?>