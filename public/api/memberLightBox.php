<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function orderItem($mem_id){

//    require_once("../../src/connect_cgd102g2.php"); //開發路徑
   require_once("../connect_cgd102g2.php");//上線路徑

    $sql="SELECT OTI.ORDER_ITEMS_ID,OTI.PROD_ORDERS_ID,PRO.PROD_ID,PRO.PROD_NAME,PRO.PROD_PIC1,PRO.PROD_PRICE,OTI.ORDER_ITEMS_QTY,
    PD.PROD_ORDERS_SUBTOTAL,PD.PROD_ORDERS_TOTAL,PD.PROD_ORDERS_CPS_ID
        FROM ORDER_ITEMS OTI JOIN PRODUCT PRO
        ON OTI.PROD_ID = PRO.PROD_ID
        JOIN PRODUCT_ORDERS PD
        ON OTI.PROD_ORDERS_ID = PD.PROD_ORDERS_ID
         WHERE PD.MEM_ID={$mem_id}";

    $product = $pdo->query($sql);
    $products = $product->fetchAll();

    $data=[];
    foreach($products as $i=>$thing){
        $data[]=$thing;
    }

    echo json_encode($data);

}
orderItem($_GET['mem_id'])




?>