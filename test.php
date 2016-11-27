<?php
require_once 'conf/db.php';

    session_start();
    echo "<pre>";
    foreach ($_SESSION['cart'] as $item) {
    $arr = unserialize($item);
    var_dump($item);
    }