<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function orderItem($order_id){

   // require_once("../connect_cgd102g2.php"); //開發路徑
   require_once("../connect_cgd102g2.php");//上線路徑

    $sql="select   oti.order_items_ID,oti.prod_orders_id,pro.prod_id,pro.prod_name,pro.prod_pic1,pro.prod_price
    from order_items oti join product pro
    on oti.prod_id = pro.PROD_ID where oti.prod_orders_id={$order_id}";

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