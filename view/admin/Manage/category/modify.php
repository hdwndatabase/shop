<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        li{
            list-style: none;
        }
        *{
            padding: 0px;
            margin:0px;
        }
        .header{
            width:100%;
            height:33px;
            background: url(/shop/public/images/background.gif) repeat-x;
            font-weight: 700;
            font-family: 微软雅黑;
            font-size: 18px;
            line-height: 31px;
            padding-left: 30px;
        }
        .blank{
            width:100%;
            height:33px;
        }
        .sth{
            width:1202px;
            height:49px;
            margin:0 auto;
        }
        .sth .guanliyuanxuanxiang{
            width:260px;
            height:49px;
            background: url(/shop/public/images/quanbushangpinfenlei.bmp) repeat-x;
            float:left;
        }
        .sth .guanliyuanxuanxiang p{
            text-align: center;
            line-height: 49px;
            font-family: 微软雅黑;
            color:white;
            font-size:17px;
        }
        .sth .list{
            width:942px;
            height:49px;
            float:left;
            list-style: none;
        }
        .sth .list li a{
            width:157px;
            height:49px;
            float:left;
            line-height: 49px;
            background: rgb(239,239,239);
            font-size: 16px;
            text-align: center;
            display: block;
            font-family: 微软雅黑;
            text-decoration: none;
        }
        .sth .list li a:hover{
            background: rgb(229,230,230);
        }
        #back{
            width: 100px;
            margin-left: 240px;
            margin-top: 20px;
        }
        #back a{
            text-decoration: none;
            font-weight: 800;
            font-size: 20px;
            color:#006600;
            font-family: 楷体;
        }
        #back a:hover{
            color:rgb(128,128,128);
        }
        #table table .title td{
            font-size: 18px;
            font-weight: 600;
        }
        #table table td{            
            text-align: center;
            vertical-align: middle;
        }
        #table{
            width:19%;
            margin-left: 240px;
        }
        #table a{
            text-decoration: none;
            color:#CC9933;
            font-weight: 600;
        }
        #table a:hover{
            color:#FFCC33;
        }
        .form{
            padding-left: 20px;
            padding-top: 20px;
            font-family: 楷体;
            font-size: 20px;
            font-weight: 500;
        }
        .form input[type="text"]{
            width:200px;
            height:25px;
        }
        .form input[type="submit"]{
            width:60px;
            height:30px;
            margin-left: 160px;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        p{
            font-weight: 700;
        }
        .return{
            text-decoration: none;
            font-family: 楷体;
            font-weight: 600;
            font-size: 20px;
            margin-left: 250px;
        }
    </style>
</head>
<body>

</body>
</html>
<?php
    session_start();
    require_once '../../../../conf/db.php';
    require_once '../../../../public/header_admin.php';

    $id = @addslashes($_GET['id']);
    if (@$_GET['m']=='yes') {
        $name = @addslashes($_POST['new_category']);
        $db->query("UPDATE category SET name='$name' WHERE id='$id'") or die("修改失败");
        echo "<h2>修改成功</h2>";
        echo "<a href='category.php'>返回</a>";
    } else {
        $result = $db->query("SELECT name FROM category WHERE id='$id'");
        $old_name = $result->fetch_assoc();
        echo "<p>原名称:".$old_name['name']."</p>";
?>
<div class="form">
<form action=modify.php?m=yes&id=<?php echo $id;?> method="post">
    <div>请输入新分类名称<input type="text" name="new_category"></div>
    <div><input type="submit" value="提交修改"></div>
</form>
</div>
        <a class="return" href="category.php">返回</a>
<?php } ?>