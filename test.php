<?php
    require_once 'conf/db.php';
    $result = $db->query("SELECT * from brand WHERE id=100");
    var_dump($result)
