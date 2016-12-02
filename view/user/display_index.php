<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        img{
            width:100px;
            height:100px;
        }
    </style>
</head>
<body>

</body>
</html>
<?php
$result = $db->query("SELECT * FROM category");
?>
外层ul是每个分类，内层ul是每个分类展示的五个商品
<div class="wrap">
    <ul class="outer">
<?php
while ($cat = $result->fetch_assoc()) {
    ?>
    <li>
        <div class="left"><?php echo $cat['name'];?></div>
        <div class="right"><ul class="inner"><?php
            $result2 = $db->query("SELECT good.id AS id, concat(brand.name,' ',good.name) AS title,price, img_name FROM good INNER JOIN brand ON good.brand_id = brand.id WHERE category_id='".$cat['id']."' ORDER BY sale_count DESC LIMIT 5");
            for ($i = 0; $i < 5; $i++) {
                $good = $result2->fetch_assoc();
                ?>
                <li>
                    <div class="img top"><a href="detailPage.php?goodId=<?php echo $good['id'];?>"><img src="/shop/public/images/<?php echo $good['img_name'];?>"></a></div>
                    <div class="title downside"><a href="detailPage.php?goodId=<?php echo $good['id'];?>"><?php echo $good['title']."  ".$good['price']."￥";?></a></div>
                </li>
                <?php
            }
                ?></ul></div>
    </li>
<?php
}
?>
</ul>
</div>
