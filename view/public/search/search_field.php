<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.search .text{
			width:200px;
			height: 27px;
			margin-bottom: 7px;
		}
		.search .submit{
			height: 30px;
			width: 50px;
		}
		select{
			width: 60px;
			height: 30px;
		}
	</style>
</head>
<body>

</body>
</html>
<form action="search.php" method="get" class="search">
    <div class="search">
        <?php
            require_once './view/public/fetch_cat.class.php';
            $fc = new Fetch_Cat($db);
            $fc->display_select();
        ?>
        <input class="text" type="text" name="q">
        <input class="submit" type="submit" value="搜索">
    </div>
</form>