<div class="popis">
        <h1>Historia objednavok</h1>
</div>
<?php /** @var \App\Model\user $data */

?>
<?php
$object = $data->getOrders();
$celkovaSuma = 0;
?>
<div class="menu" style="color: white; text-align: center">
    <section class="interior">
    <table>
        <thead>
        <tr>
            <th>Cislo objednavky</th>
            <th>Meno</th>
            <th>Cas objednavky</th>
            <th>Zakupene polozky</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($object as $order){
            $order_items = $order->getOrderItem();
        ?>
        <tr>
            <td><?php /** @var \App\Model\order $order */
                echo $order->getOrderId() ?></td>
            <td><?php echo $order->getUserId() ?></td>
            <td><?php echo $order->getCreated() ?></td>
            <td>
                <ul class="orderUl">
                    <?php
                    foreach ($order_items as $item){
                        $celkovaSuma += intval($item->getPrice());
                        ?>
                    <li><?php echo $item->getNameOfItem(),'&nbsp;&nbsp;&nbsp;&nbsp;', $item->getQuantity(),'x&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    ','celkova cena : ', $item->getPrice(),'€' ?></li>

                    <?php }?>
                </ul>
            </td>
        </tr>
<!--        <tr>-->
<!--            <td>1002</td>-->
<!--            <td>Jane Smith</td>-->
<!--            <td>2022-12-26</td>-->
<!--            <td>-->
<!--                <ul>-->
<!--                    <li>item 4</li>-->
<!--                    <li>item 5</li>-->
<!--                </ul>-->
<!--            </td>-->
<!--        </tr>-->
        <?php }?>

        </tbody>
    </table>
    <h1 style="margin-left: 20%">Celkova suma: <?php echo $celkovaSuma ?>€</h1>
    </section>
</div>