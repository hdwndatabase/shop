<?php
    require_once '../../../../conf/db.php';
    $id = addslashes($_GET['id']);
    $db->query("DELETE FROM brand WHERE id='$id'") or die("删除失败");
    header('Location: brand.php');
