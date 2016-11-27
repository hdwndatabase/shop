<?php
    session_start();
    if(empty($_SESSION['cart'])|count($_SESSION['cart'])===0) {
        $_SESSION['cart'] = array();
    }
    require_once '../../../conf/db.php';
    require_once 'Cart.class.php';

    $msg = null;

    @$id = addslashes($_POST['id']);
    @$title = addslashes($_POST['title']);
    @$price = doubleval(addslashes($_POST['price']));
    @$quantity = intval(addslashes($_POST['quantity']));
    @$imgName = addslashes($_POST['imgName']);
    @$action = addslashes($_POST['action']);

    $cart = new Cart($db);

    //获取价格
    $price = $db->query("SELECT price FROM good WHERE id='$id'");
    $price = $price->fetch_assoc();
    $price = $price['price'];

    switch ($action) {
        case 'add':
            //检查库存
            $msg = $cart->checkGoodsNumber($id);
            if($msg === false) {
                echo json_encode("添加失败,库存不足!");
                exit;
            }

            //库存非0，添加购物车
            $cart->addCart($id, $title, doubleval($price),intval($quantity),$imgName);
            echo json_encode("添加成功");
            break;
        case 'remove':
            $cart->removeFromCart($id);
            echo json_encode($price);
            break;
        case 'add1':
            $cart->addCart1($id);
            echo json_encode($price);
            break;
    }

