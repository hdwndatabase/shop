<?php

    if ($_GET['cat'] == 'all') {
        require_once 'view/public/fetch_cat.class.php';
        $fc = new Fetch_Cat($db);
        $fc->display_bar();//展示搜索结果页面中的分类选择
    } else {

    }