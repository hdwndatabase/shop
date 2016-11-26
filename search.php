<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        *{
            margin:0px;
            padding:0px;
        }
        a{
            text-decoration: none;
            color: rgb(128,128,128);
        }
        .header{
            height: 150px;
        }
        .top{
            width:100%;
            height:33px;
            background: url(/shop/public/images/background.gif) repeat-x;
            font-size: 25px;
            font-weight: 600;
            padding-left: 70px;
            text-align: middle;
        }
        .login_register{
            margin-left: 70px;
        }
        .search input[type="text"]{
            width:150px;
            height:25px;
            margin-left: 200px;
        }
        .search input[type="submit"]{
            height: 30px;
            width:50px;
        }
    </style>
</head>
<body>

</body>
</html>

<?php
session_start();
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





    
