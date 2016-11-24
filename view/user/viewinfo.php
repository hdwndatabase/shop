<?php
    session_start();
    require_once '../../public/header.php';
    require_once '../../conf/db.php';

    $name = $_SESSION['user'];
    $result = $db->query("SELECT name,addr,phone,email,zipcode FROM user WHERE name='$name'");
    $elems = $result->fetch_assoc();
?>
<h2>用户个人信息</h2>
<table border="1px">
    <tr>
        <td>用户名</td>
        <td><?php echo $elems['name'] ?></td>
    </tr>
    <tr>
        <td>地址</td>
        <td><?php echo $elems['addr'] ?></td>
    </tr>
    <tr>
        <td>手机号码</td>
        <td><?php echo $elems['phone'] ?></td>
    </tr>
    <tr>
        <td>邮箱</td>
        <td><?php echo $elems['email'] ?></td>
    </tr>
    <tr>
        <td>邮编</td>
        <td><?php echo $elems['zipcode'] ?></td>
    </tr>
</table>
