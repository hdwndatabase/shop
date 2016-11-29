<table>
    <tr>
        <td>订单号:<?php echo $order['id'] . "  "; ?> 下单时间:<?php echo $order['datetime'] . "  "; ?>
            订单状态:<?php switch ($order['state']) {
                case '1':
                    echo '待发货';
                    break;
                case '2':
                    echo '已发货';
                    break;
                case '3':
                    echo '已签收';
                    break;
                default:
                    echo '未知状态';
                    break;
            } ?></td>
    </tr>
    <?php
    $result2 = $db->query("SELECT order_detail.*,concat(good.name,' ',brand.name) AS title FROM order_detail INNER JOIN good ON order_detail.good_id = good.id INNER JOIN brand ON good.brand_id = brand.id WHERE order_detail.order_id='" . $order['id'] . "'");
    while ($each_detail = $result2->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $each_detail['title'] . "  x" . $each_detail['good_count']; ?></td>
            <td><?php echo $each_detail['price'] . "元"; ?></td>
        </tr>
        <?
    }
    ?>
    <tr>
        <td>合计: <?php echo $order['total_price']; ?>元</td>
    </tr>
    <tr>
        <td>收件人信息:</td>
    </tr>
    <tr>
        <td rowspan="2"><?php echo $order['name'] . "  (收)   " . $order['phone']; ?>
            <?php echo $order['addr'] . "   " . $order['zipcode']; ?></td>
    </tr>
</table>