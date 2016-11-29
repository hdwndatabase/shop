<?php
$id = $_POST['id'];
$action = $_POST['action'];
require_once '../../../../conf/db.php';

switch ($action) {
    case 'send':
        $db->query("UPDATE `order` SET state=2 WHERE id='$id'") or die("出现错误");
        echo json_encode('success');
        break;
    case 'del':
        $db->query("DELETE FROM order_detail WHERE order_id='$id'") or die("出现错误");
        $db->query("DELETE FROM `order` WHERE id='$id'") or die("出现错误");
        echo json_encode("success");
        break;
}