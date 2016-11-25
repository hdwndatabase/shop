<?php
    define('DB_HOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PWD','carotpa');
    define('DB_NAME','shop');

    $db = new mysqli(DB_HOST, DB_USERNAME, DB_PWD, DB_NAME) or die('连接数据库失败');
