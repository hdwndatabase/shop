<?php
    session_start();
    require_once '../../../../conf/db.php';
    $name = $_SESSION['user'];

    if (isset($_POST['pwd'])) {
        if (isset($_POST['old']) && isset($_POST['new'])) {
            $old_pwd = $_POST['old'];
            $new_pwd = $_POST['new'];
            $result = $db->query("SELECT * FROM user WHERE pwd=md5('$old_pwd') AND name='$name'");
            if (!$result->num_rows) {
                header('Location: ./pwdErr.php');
            } else {
                $db->query("UPDATE user SET pwd=md5('$new_pwd') WHERE name='$name'") or die("修改失败！请稍后重试");
                header("Location: ./success.php");
            }
        }
    }

    if (isset($_POST['tel1'])) {
        if (isset($_POST['tel'])) {
            $tel = $_POST['tel'];
            $db->query("UPDATE user SET phone='$tel' WHERE name='$name'") or die("修改失败！请稍后重试");
            header("Location: ./success.php");
        }
    }

    if (isset($_POST['addr1'])) {
        if (isset($_POST['addr'])) {
            $addr = $_POST['addr'];
            $db->query("UPDATE user SET addr='$addr' WHERE name='$name'") or die("修改失败！请稍后重试");
            header("Location: ./success.php");
        }
    }

    if (isset($_POST['email1'])) {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $db->query("UPDATE user SET email='$email' WHERE name='$name'") or die("修改失败！请稍后重试");
            header("Location: ./success.php");
        }
    }

    if (isset($_POST['zipcode1'])) {
        if (isset($_POST['zipcode'])) {
            $zipcode = $_POST['zipcode'];
            $db->query("UPDATE user SET zipcode='$zipcode' WHERE name='$name'") or die("修改失败！请稍后重试");
            header("Location: ./success.php");
        }
    }