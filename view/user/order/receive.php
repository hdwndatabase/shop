<?php
//用于订单确认收货处理
$id = $_POST['id'];
$action = $_POST['action'];
require_once '../../../conf/db.php';

switch ($action) {
    case 'recv':
        $db->query("UPDATE `order` SET state=3 WHERE id='$id'") or die("出现错误");
        echo json_encode('success');
        break;
    case 'del':
    case 'del':
        $db->query("DELETE FROM order_detail WHERE order_id='$id'") or die("出现错误");
        $db->query("DELETE FROM `order` WHERE id='$id'") or die("出现错误");
        echo json_encode("success");
        break;
}
