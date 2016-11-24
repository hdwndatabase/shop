<?php
    session_start();
    require_once '../../../../conf/db.php';
    require_once '../../../../public/header_admin.php';

    if (@$_GET['m']=='yes' && @isset($_GET['id'])) {
        $id = addslashes($_GET['id']);
       $name = addslashes($_POST['name']);
       $price = addslashes($_POST['price']);
       $store = addslashes($_POST['store']);
       $sale_count = addslashes($_POST['sale_count']);
       $category = addslashes($_POST['category']);
       $brand = addslashes($_POST['brand']);

        $db->query("UPDATE good SET name='$name',price='$price',
      store_count='$store',sale_count='$sale_count',category_id='$category',
      brand_id='$brand' WHERE id='$id'") or die("修改失败");
        echo "<h2>修改成功</h2>";
        echo "<a href='good.php'>返回</a>";
    } else {
        $id = addslashes($_GET['id']);
        $result = $db->query("SELECT * FROM good WHERE id='$id'");
        $old = $result->fetch_assoc();

        $cat_id = $old['category_id'];
        $brand_id = $old['brand_id'];

        require_once 'modify.html';
    }


?>
