<?php
    session_start();
    require_once '../../../../conf/db.php';
    require_once '../../../../public/header_admin.php';

    $id = @addslashes($_GET['id']);
    if (@$_GET['m']=='yes') {
        $name = @addslashes($_POST['new_category']);
        $db->query("UPDATE category SET name='$name' WHERE id='$id'") or die("修改失败");
        echo "<h2>修改成功</h2>";
        echo "<a href='category.php'>返回</a>";
    } else {
        $result = $db->query("SELECT name FROM category WHERE id='$id'");
        $old_name = $result->fetch_assoc();
        echo "<p>原名称:".$old_name['name']."</p>";
?>
<form action=modify.php?m=yes&id=<?php echo $id;?> method="post">
    <div>请输入新分类名称<input type="text" name="new_category"></div>
    <div><input type="submit" value="提交修改"></div>
</form>
        <a href="category.php">返回</a>
<?php } ?>