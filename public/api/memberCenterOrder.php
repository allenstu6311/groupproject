<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function getMemberId($mem_id){
      // require_once("../../src/connect_cgd102g2.php"); //開發路徑
  require_once("../connect_cgd102g2.php");//上線路徑

  $sql="SELECT  POD.PROD_ORDERS_ID,POD.PROD_ORDERS_DATE,M.MEM_NAME,POD.PROD_ORDERS_STATUS,POD.PROD_ORDERS_ADDRESS
  FROM PRODUCT_ORDERS POD JOIN MEMBER M 
  ON POD.MEM_ID=M.MEM_ID
  WHERE POD.MEM_ID={$mem_id}
  ORDER BY POD.PROD_ORDERS_DATE;";
  
  $info = $pdo->query($sql);
  
  $infos = $info->fetchAll();
  
  $data=[];
  
  foreach($infos as $i=>$thing){
      $data[]=$thing;
  }   
  
  echo json_encode($data);
}
getMemberId($_GET['mem_id'])




?>