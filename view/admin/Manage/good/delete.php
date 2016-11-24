<?php
    require_once '../../../../conf/db.php';
    $id = addslashes($_GET['id']);
    $db->query("DELETE FROM good WHERE id='$id'") or die("删除失败");
    header('Location: good.php');
