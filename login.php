<?php
    session_start();
    require_once './public/header.php';
    if (isset($_SESSION['user'])) {
        echo "<h2>欢迎你,".$_SESSION['user']."</h2>";
    } else {
        require_once './conf/db.php';
        if (!empty(@$_POST['username'] && !empty(@$_POST['password']))) {
            @$username = addslashes($_POST['username']);
            @$password = addslashes($_POST['password']);

            $result = $db->query("SELECT * FROM user WHERE name='$username' AND pwd=md5('$password')");
            $row = $result->fetch_assoc();
            if ($result->num_rows) {
                $_SESSION['user'] = $row['name'];
                header('Location: ./login.php');
            } else {
                echo "<script>alert('登录失败！请重新填写信息')</script>";
            }
        }
    require_once './view/public/login.html';
    }
?>


