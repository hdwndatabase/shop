<?php
    require_once 'public/header.php';
    require_once 'view/user/index/search_filed.php';
    require_once 'conf/db.php';

    $query = addslashes($_GET['q']);
    $cat = addslashes($_GET['cat']);

    if ($cat == 'all') {
        $result = $db->query("SELECT * FROM good WHERE name LIKE '%".$query."%'") or die("查询失败");
    } else {
        $result = $db->query("SELECT * FROM good  WHERE name LIKE '%".$query."%' AND category_id='$cat'") or die("查询失败");
    }
    
    if (!$result->num_rows) {
        require_once 'view/public/search/searchErr.html';
    } else {
        require_once 'view/public/search/search_result.php';
    }
    
    
