<?php
    session_start();
    require_once '../../../../public/header_admin.php';
    require_once '../../../../conf/db.php';
    if (@$_GET['a']!=='add') {
?>
<a href="good.php?a=add">添加商品</a><br><br>
<a href="/shop/admin.php">返回</a><br><br>
<?php
    $result = $db->query("SELECT * FROM good");
    $num = $result->num_rows;
?>

<form action="">

</form>
<table border="1px">
    <tr>
        <td>商品ID</td>
        <td>商品名称</td>
        <td>价格</td>
        <td>品牌</td>
        <td>分类</td>
        <td>库存</td>
        <td>销量</td>
        <td>商品图片</td>
        <td>操作</td>
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
