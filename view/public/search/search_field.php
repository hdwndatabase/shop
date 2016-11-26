
<form action="search.php" method="get" class="search">
    <div class="search">
        <?php
            require_once './view/public/fetch_cat.class.php';
            $fc = new Fetch_Cat($db);
            $fc->display_select();
        ?>
        <input type="text" name="q">
        <input type="submit" value="搜索">
    </div>
</form>