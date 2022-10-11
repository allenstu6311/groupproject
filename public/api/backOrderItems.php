<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

  // require_once("../connect_cgd102g2.php"); //開發路徑
  require_once("../connect_cgd102g2.php");//上線路徑

// $sql="select DISTINCT pod.prod_orders_id,pod.prod_orders_date,m.mem_name,pod.PROD_ORDERS_STATUS
// from PRODUCT_ORDERS pod join member m 
// on pod.mem_id=m.mem_id;";
$sql="select DISTINCT pod.PROD_ORDERS_ID,pod.PROD_ORDERS_DATE,m.MEM_NAME,pod.PROD_ORDERS_STATUS
from PRODUCT_ORDERS pod join MEMBER m 
on pod.MEM_ID=m.MEM_ID;";

$info = $pdo->query($sql);

$infos = $info->fetchAll();

$data=[];

foreach($infos as $i=>$thing){
    $data[]=$thing;
}   

echo json_encode($data);



?>