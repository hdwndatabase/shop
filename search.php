<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .search{
            margin-top: 50px;
        }
    </style>
</head>
<body style="background: url(/shop/public/images/bg1.jpg);">

</body>
</html>
<script src="/shop/public/js/jquery-3.1.1.js"></script>
<script src="/shop/public/js/addcart.js"></script>
<?php
session_start();
if(empty(@$_SESSION['cart'])|count(@$_SESSION['cart'])===0) {
    $_SESSION['cart'] = array();
}
require_once 'conf/db.php';
require_once 'public/header.php';
require_once 'view/public/search/search_field.php';


$query = addslashes(preg_replace('/ /i', '', $_GET['q']));
$cat = addslashes($_GET['cat']);
$result = null;

$appendix = " WHERE concat(category.name,brand.name,good.name) LIKE '%".$query."%'";
$appendix .= $cat == 'all' ? '' : " AND category_id='" . $cat . "'";
if (isset($_GET['catId'])) {
    $appendix = $appendix . " AND category_id=" . $_GET['catId'];
}
if (isset($_GET['brandId'])) {
    $appendix = $appendix . " AND brand_id=" . $_GET['brandId'];
}
if (isset($_GET['sort'])) {
    switch ($_GET['sort']) {
        case '1':
            $appendix = $appendix . " ORDER BY price ASC";
            break;
        case '2':
            $appendix = $appendix . " ORDER BY price DESC";
            break;
        case '3':
            $appendix = $appendix . " ORDER BY sale_count DESC";
            break;
        case '4':
            $appendix = $appendix . " ORDER BY sale_count ASC";
            break;
        default:
    }
}

require_once 'view/public/search/search.class.php';
$search = new search($db);
$result = $search->search($appendix);
$categories = $search->search2("SELECT DISTINCT categoryId,categoryName FROM (" ,$appendix,") a");
$brands = $search->search2("SELECT DISTINCT brandId,brandName FROM (", $appendix,") b");

if (!$result->num_rows) {
    require_once 'view/public/search/searchErr.html';
} else {
    require_once 'view/public/search/toolbar.php';//根据分类，品牌筛选以及排序toolbar
    require_once 'view/public/search/display_result.html';
}





    
