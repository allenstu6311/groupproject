<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

  // require_once("../connect_cgd102g2.php"); //開發路徑
  require_once("../connect_cgd102g2.php");//上線路徑

$sql="select DISTINCT pod.prod_orders_id,pod.prod_orders_date,m.mem_name,pod.PROD_ORDERS_STATUS
from PRODUCT_ORDERS pod join member m 
on pod.mem_id=m.mem_id;";

$info = $pdo->query($sql);

$infos = $info->fetchAll();

$data=[];

foreach($infos as $i=>$thing){
    $data[]=$thing;
}   

echo json_encode($data);



?>