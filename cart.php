<?php
session_start();
require_once 'conf/db.php';
require_once 'public/header.php';
require_once 'view/user/cart/Cart.class.php';
$cart = new Cart($db);

if(isset($_SESSION['user'])) {
    if($cart->checkDBOrderNums() === 0) {
        $cart->synchronize();
    } else {
        $_SESSION['cart'] = array();
    }
}
if(!@count($_SESSION['cart']) && !$cart->checkDBOrderNums()) {
    require_once 'view/user/cart/emptycart.html';
} else {
    require_once 'view/user/cart/cartdetail.php';
}
?>