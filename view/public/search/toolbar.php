<?php
function sortId($i)
{
    if (mb_ereg('sort=[0-9]', $_SERVER['REQUEST_URI']) === false) {
        echo $_SERVER['REQUEST_URI'] . '&sort=' . $i;
    } else {
        echo preg_replace('/sort=[0-9]/', 'sort=' . $i, $_SERVER['REQUEST_URI']);
    }
}

?>
<!--对搜索出来的商品过滤排序-->

<div class="toolbar">

    <!--根据分类，品牌筛选-->
    <div class="filter">
        <!--        分类筛选-->
        <div class="cat">
            <div class="left">分类</div>
            <div class="right">
                <ul class="cat">
                    <li>
                        <a href="<?php echo preg_replace('/[&]catId=[0-9]{1,}/', '', $_SERVER['REQUEST_URI']); ?>">全部</a>
                    </li>
                    <?php
                    while ($cat = $categories->fetch_assoc()) {
                        ?>
                        <li>
                            <a href="<?php if (mb_ereg('catId=[0-9]{1,}', $_SERVER['REQUEST_URI']) === false) { echo $_SERVER['REQUEST_URI'] . '&catId=' . $cat['categoryId']; } else { echo preg_replace('/catId=[0-9]{1,}/', 'catId=' . $cat['categoryId'], $_SERVER['REQUEST_URI']); } ?>"> <?php echo $cat['categoryName']; ?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!--        品牌筛选-->
        <div class="brand">
            <div class="left">品牌</div>
            <div class="right">
                <ul class="brand">
                    <li>
                        <a href="<?php echo preg_replace('/[&]brandId=[0-9]{1,}/', '', $_SERVER['REQUEST_URI']); ?>">全部</a>
                    </li>
                    <?php
                    while ($brand = $brands->fetch_assoc()) {
                        ?>

                        <li>
                            <a href="<?php if (mb_ereg('brandId=[0-9]{1,}', $_SERVER['REQUEST_URI']) === false) { echo $_SERVER['REQUEST_URI'] . '&brandId=' . $brand['brandId']; } else { echo preg_replace('/brandId=[0-9]{1,}/', 'brandId=' . $brand['brandId'], $_SERVER['REQUEST_URI']); } ?>"><?php echo $brand['brandName']; ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <!--根据条件排序-->
    <div class="sort">
        <div class="left">条件</div>
        <div class="right">
            <ul class="tiaojian">
                <li><a href="<?php echo preg_replace('/[&]sort=[0-9]/', '', $_SERVER['REQUEST_URI']); ?>">默认排序</a></li>
                <li><a href="<?php sortId(1); ?>">价格由低到高</a></li>
                <li><a href="<?php sortId(2); ?>">价格由高到低</a></li>
                <li><a href="<?php sortId(3); ?>">销量由高到低</a></li>
                <li><a href="<?php sortId(4); ?>">销量由低到高</a></li>
            </ul>
        </div>
    </div>
</div>