<?php
require_once 'conf/db.php';
require_once 'public/header.php';
require_once 'view/public/search/search_field.php';


$query = addslashes(preg_replace('/ /i', '', $_GET['q']));
$cat = addslashes($_GET['cat']);
$result = null;

$appendix = $cat == 'all' ? '' : " AND category_id='" . $cat . "'";
if(isset($_GET['catId'])) {
    $appendix = $appendix." AND category_id=".$_GET['catId'];
}
if(isset($_GET['brandId'])) {
    $appendix = $appendix." AND brand_id=".$_GET['brandId'];
}
if(isset($_GET['sort'])) {
    switch ($_GET['sort']) {
        case '1':
            $appendix = $appendix." ORDER BY price ASC";
            break;
        case '2':
            $appendix = $appendix." ORDER BY price DESC";
            break;
        case '3':
            $appendix = $appendix." ORDER BY sale_count DESC";
            break;
        case '4':
            $appendix = $appendix." ORDER BY sale_count ASC";
            break;
        default:
    }
}


$query_str = "SELECT good.id as id,good.name AS goodName, brand.id AS brandId,brand.name AS brandName ,category.id AS categoryId, category.name AS categoryName,price,category_id,store_count,sale_count,img_name FROM good INNER JOIN brand ON good.brand_id = brand.id INNER JOIN category ON good.category_id = category.id WHERE concat(category.name,brand.name,good.name) LIKE '%$query%'";

$result = $db->query($query_str . $appendix) or die("查询失败");
$categories = $db->query("SELECT DISTINCT categoryId,categoryName FROM (" . $query_str .$appendix. ") a");
$brands = $db->query("SELECT DISTINCT brandId,brandName FROM (" . $query_str .$appendix. ") b");

if (!$result->num_rows) {
    require_once 'view/public/search/searchErr.html';
} else {
    require_once 'view/public/search/toolbar.php';//根据分类，品牌筛选以及排序toolbar
    require_once 'view/public/search/display_result.html';
}





    
