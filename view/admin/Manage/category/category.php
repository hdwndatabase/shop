<?php
    session_start();
    require_once '../../../../public/header_admin.php';
    require_once '../../../../conf/db.php';
    if (@$_GET['a']!=='add') {
?>
<a href="category.php?a=add">添加分类</a><br><br>
<a href="/shop/admin.php">返回</a><br><br>
<?php
    $result = $db->query("SELECT * FROM category");
    $num = $result->num_rows;
?>

<table border="1px">
    <tr>
        <td>分类ID</td>
        <td>分类名称</td>
        <td>操作</td>
    </tr>
    <?php
        $i=1;
        while($category = $result->fetch_assoc()) {

            echo "<tr>";
            echo "<td>".$i."</td><td>".$category['name']."</td>";
            $i++;
            ?>
            <td><a href=delete.php?id=<?php echo $category['id']; ?>>删除</a>
                <a href="modify.php?id=<?php echo $category['id']; ?>">修改名称</a></td>
            <?php
        }
        echo "</table>";
        } else {
        require_once 'add.php';
    }
    ?>
