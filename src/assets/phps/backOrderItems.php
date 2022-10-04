<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../../connect_cgd102g2.php");

$sql="select DISTINCT pod.prod_orders_id,pod.prod_orders_date,m.mem_name,pod.prod_orders_cps_id ,od.order_items_id,od.order_items_price,od.order_items_qty
from PRODUCT_ORDERS pod join member m 
on pod.mem_id=m.mem_id
join ORDER_ITEMS od
on pod.prod_orders_id= od.prod_orders_id";

$info = $pdo->query($sql);

$infos = $info->fetchAll();

$data=[];

foreach($infos as $i=>$thing){
    $data[]=$thing;
}   

echo json_encode($data);



?>