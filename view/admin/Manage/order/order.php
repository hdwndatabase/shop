<script src="/shop/public/js/jquery-3.1.1.js"></script>
<script src="/shop/public/js/send.js"></script>
<?php
session_start();
require_once '../../../../conf/db.php';
require_once '../../../../public/header_admin.php';
?>
<li>
    <ul><a href="/shop/view/admin/Manage/order/order.php">全部</a></ul>
    <ul><a href="/shop/view/admin/Manage/order/order.php?status=1">待发货</a></ul>
    <ul><a href="/shop/view/admin/Manage/order/order.php?status=2">已发货</a></ul>
    <ul><a href="/shop/view/admin/Manage/order/order.php?status=3">已收货</a></ul>
</li>
<?php

$query_str = "SELECT * FROM `order`";
$appendix = '';

@$status = addslashes($_GET['status']);
if (@isset($status)) {
    switch (@$status) {
        case '1':
            $appendix = " WHERE state='1'";
            break;
        case '2':
            $appendix = " WHERE state='2'";
            break;
        case '3':
            $appendix = " WHERE state='3'";
            break;
        default:
            $appendix = '';
            break;
    }
}

//获取用户订单
$result = $db->query($query_str . $appendix);
while ($order = $result->fetch_assoc()) {
    ?>
    <table border="1px">
        <tr>
            <td colspan="2">订单号:<?php echo $order['id'] . "  "; ?> 下单时间:<?php echo $order['datetime'] . "  "; ?>
                订单状态:<?php switch ($order['state']) {
                    case '1':
                        echo '待发货';
                        break;
                    case '2':
                        echo '已发货';
                        break;
                    case '3':
                        echo '已收货';
                        break;
                    default:
                        echo '未知状态';
                        break;
                } ?></td>
        </tr>
        <?php
        $result2 = $db->query("SELECT order_detail.*,concat(brand.name,' ',good.name) AS title FROM order_detail INNER JOIN good ON order_detail.good_id = good.id INNER JOIN brand ON good.brand_id = brand.id WHERE order_detail.order_id='" . $order['id'] . "'");
        while ($each_detail = $result2->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $each_detail['title'] . "  x" . $each_detail['good_count']; ?></td>
                <td><?php echo $each_detail['price'] . "元"; ?></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td colspan="2">合计: <?php echo $order['total_price']; ?>元</td>
        </tr>
        <tr>
            <td colspan="2">收件人信息:</td>
        </tr>
        <tr>
            <td colspan="2"><?php echo $order['name'] . "  (收)   " . $order['phone']; ?>
                <br><?php echo $order['addr'] . "   " . $order['zipcode']; ?></td>
        </tr>
        <tr class="send">
            <td colspan="2">
                <?php
                if($order['state']=='1') {
                    echo "<button class='send' id='".$order['id']."'>发货"."</button>";
                } else if($order['state']=='3') {
                    echo "<button class='del' id='".$order['id']."'>删除订单"."</button>";
                }
                ?>
            </td>
        </tr>
    </table>
    <?php
}
?>
