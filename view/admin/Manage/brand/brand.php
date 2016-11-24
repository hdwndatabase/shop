<?php
    session_start();
    require_once '../../../../public/header_admin.php';
    require_once '../../../../conf/db.php';
    if (@$_GET['a']!=='add') {
?>
        <a href="brand.php?a=add">添加品牌</a><br><br>
        <a href="/shop/admin.php">返回</a><br><br>
<?php
        $result = $db->query("SELECT * FROM brand");
        $num = $result->num_rows;
?>

<table border="1px">
    <tr>
        <td>品牌ID</td>
        <td>品牌名称</td>
        <td>操作</td>
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
