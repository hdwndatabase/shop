<?php
    session_start();
    require_once './public/header_admin.php';
    if (!isset($_SESSION['admin'])) {
        require_once './view/public/login_admin.html';
        require_once './conf/db.php';
        if (!empty(@$_POST['username'] && !empty(@$_POST['password']))) {
            @$username = addslashes($_POST['username']);
            @$password = addslashes($_POST['password']);

            $result = $db->query("SELECT * FROM admin WHERE name='$username' AND pwd=md5('$password')") or die("查询无果");
            $row = $result->fetch_assoc();
            if ($result->num_rows) {
                $_SESSION['admin'] = $row['name'];
                header('Location: ./admin.php');
            } else {
                echo "<script>alert('登录失败！请重新填写信息')</script>";
            }
        }
    } else {
        require_once './view/admin/adminPage.php';
    }
?>
