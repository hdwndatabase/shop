<?php
session_start();
require_once 'public/header.php';
require_once 'conf/db.php';
if(!@count($_SESSION['cart'])) {
    require_once 'view/user/cart/emptycart.html';
} else {
    require_once 'view/user/cart/cartdetail.html';
}
?>