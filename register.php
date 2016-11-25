<?php
    require_once './public/header.php';
    session_start();
    if (isset($_SESSION['registered'])) {
        $_SESSION = array();
        session_destroy();
        echo "<h2 class='msg'>注册成功！请<a href='./login.php' class='login_link'>登陆</a></h2>";
    } else {
        if (!empty($_POST["username"]) && !empty($_POST["pwd"]) &&
            !empty($_POST["tel"]) && !empty($_POST["email"]) ) {
            require_once './conf/db.php';
            @$username = addslashes($_POST["username"]);
            @$pwd = addslashes($_POST["pwd"]);
            @$tel = addslashes($_POST["tel"]);
            @$email = addslashes($_POST["email"]);

            $result = $db->query("SELECT * FROM user WHERE name='$username'");
            if ($result->num_rows) {
                echo "<p class='ref_fail'>注册失败!用户名已存在<p>";
                header('Location: ./view/user/logfail.php');
                exit;
            }

            $result = $db->query("SELECT COUNT(*)+1 FROM user");
            $arr = $result->fetch_array();
            $count = $arr[0];
            $db->query("INSERT INTO user (id,name,pwd,phone,email) VALUE ('$count','$username',md5('$pwd'),'$tel','$email')") or die('注册失败');
            $_SESSION['registered'] = true;
            header('Location: ./view/user/logsuc.php');
        }
        require_once './view/user/reg.html';
    }
?>


