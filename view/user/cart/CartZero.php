<?php
session_start();
require_once '../../../conf/db.php';
$id = $_POST['id'];
$flag = $_POST['flag'];
if(!isset($_SESSION['user'])) {
    echo json_encode("success");
} else {
    $username = $_SESSION['user'];
    if ($flag == 'y') {
        $db->query("DELETE FROM shopcart WHERE user_id=(SELECT id FROM user
WHERE name='$username') AND good_count=0");
    }
    echo json_encode("success");
}

