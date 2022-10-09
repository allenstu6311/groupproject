<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function orderItem($order_id){

   require_once("../../src/connect_cgd102g2.php"); //開發路徑
//    require_once("../connect_cgd102g2.php");//上線路徑

    $sql="select oti.order_items_ID,oti.prod_orders_id,pro.prod_id,pro.prod_name,pro.prod_pic1,pro.prod_price,oti.ORDER_ITEMS_QTY,
    pd.prod_orders_subtotal,pd.prod_orders_total,pd.PROD_ORDERS_CPS_ID
        from order_items oti join product pro
        on oti.prod_id = pro.PROD_ID
        join product_orders pd
        on oti.PROD_ORDERS_ID = pd.PROD_ORDERS_ID
    where oti.prod_orders_id={$order_id}";

    $product = $pdo->query($sql);
    $products = $product->fetchAll();

    $data=[];
    foreach($products as $i=>$thing){
        $data[]=$thing;
    }

    echo json_encode($data);

}
orderItem($_GET['order_id'])




?>