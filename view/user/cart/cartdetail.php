<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <script src="/shop/public/js/jquery-3.1.1.js"></script>
    <script src="/shop/public/js/cart_plus_minus.js"></script>
    <style type="text/css">
        a{
            color:black;
        }
        #cart_detail{
            text-align: center;
            padding-left: 240px;
            font-family: 楷体;
            font-weight:600;
        }
        .plus{
            width:23px;
            height:23px;
        }
        .minus{
            width:23px;
            height:23px;
        }
        .num{
            width:40px;
            height:20px;
        }
        img{
            width:600px;
            height:500px;
        }
    </style>
</head>
<body style="background: url(/shop/public/images/bg1.jpg);">
<div id="cart_detail">
    <table class="cart" border="1px">
        <tr>
            <td>商品图片</td>
            <td>商品名称</td>
            <td>商品数量</td>
            <td>商品价格</td>
        </tr>
        <?php if(isset($_SESSION['user'])) {
            $name = $_SESSION['user'];
            $userid = $db->query("SELECT id FROM user WHERE name='$name'");
            $userid = $userid->fetch_assoc();
            $userid = $userid['id'];
            $result = $db->query("SELECT good_id FROM shopcart WHERE user_id='$userid'");
            while ($elem = $result->fetch_assoc()) {
                $goodid = $elem['good_id']; $result2 = $db->query("SELECT good_count FROM shopcart WHERE user_id='$userid' AND good_id='$goodid'");
                $result2 = $result2->fetch_assoc();
                $quantity = $result2['good_count'];
                if(!$quantity) { continue; }

                $result1 = $db->query("SELECT img_name,concat(brand.name,' ',good.name) AS title,price FROM good INNER JOIN brand ON good.brand_id = brand.id WHERE good.id='$goodid'");
                $result1 = $result1->fetch_assoc();
                $img_name = $result1['img_name'];
                $title = $result1['title'];
                $price = $result1['price'];

                ?>
                <tr id="<?php echo $goodid;?>">
                    <td class="img"><a href="/shop/detailPage.php?goodId=<?php echo $goodid?>"><img src="/shop/public/images/<?php echo $img_name;?>" alt=""></a></td>
                    <td class="title"><a href="/shop/detailPage.php?goodId=<?php echo $goodid?>"><?php echo $title;?></a></td>
                    <td class="qty">
                        <button class="minus">-</button>
                        <input type="text" class="num" value="<?php echo $quantity;?>" disabled>
                        <button class="plus">+</button></td>
                    <td class="price"><?php echo $price;?></td>
                </tr>
                <?php
            }
        } else {
            $num = count($_SESSION['cart']);
            for ($i = 0; $i < $num; $i++) {
                $id = addslashes($_SESSION['cart'][$i]['id']);
                ?>
        <tr id="<?php echo $id;?>">
            <td class="img"><a href="/shop/detailPage.php?goodId=<?php echo $id?>"><img src="<?php echo $_SESSION['cart'][$i]['imgName'];?>" alt=""></a></td>
            <td class="title"><a href="/shop/detailPage.php?goodId=<?php echo $id?>"><?php echo $_SESSION['cart'][$i]['title'];?></a></td>
        <td class="qty">
            <button class="minus">-</button>
            <input disabled class="num" type="text" value="<?php echo $_SESSION['cart'][$i]['quantity'];?>">
            <button class="plus">+</button></td>
        <td class="price"><?php $result = $db->query("SELECT price FROM good WHERE id='$id'"); $result = $result->fetch_assoc(); $price = $result['price']; echo $price * $_SESSION['cart'][$i]['quantity']; ?></td>
        </tr>
        <?php
            }
        } ?>
        <tr> <td></td> <td></td> <td>总价</td> <td id="total_price"></td> </tr>
    </table>
    <div class="jiesuan">
        <a href="addAddr.php">结算</a>
    </div>
</div>
</body>
</html>
