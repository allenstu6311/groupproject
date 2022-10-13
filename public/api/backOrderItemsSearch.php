<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

      

function orderSearch($search){
    // require_once("../../src/connect_cgd102g2.php"); //開發路徑
  require_once("../connect_cgd102g2.php");//上線路徑

  $sql="SELECT  POD.PROD_ORDERS_ID,POD.PROD_ORDERS_DATE,M.MEM_NAME,POD.PROD_ORDERS_STATUS,OT.ORDER_ITEMS_ID
  FROM PRODUCT_ORDERS POD JOIN MEMBER M 
  ON POD.MEM_ID=M.MEM_ID
  JOIN ORDER_ITEMS OT 
  ON POD.PROD_ORDERS_ID = OT.PROD_ORDERS_ID
  WHERE POD.MEM_ID LIKE '%{$search}%' OR M.MEM_NAME LIKE '%{$search}%' OR OT.PROD_ORDERS_ID LIKE'%{$search}%'
  GROUP BY  OT.PROD_ORDERS_ID
  ORDER BY POD.PROD_ORDERS_DATE;";
  
  $info = $pdo->query($sql);
  
  $infos = $info->fetchAll();
  
  $data=[];
  
  foreach($infos as $i=>$thing){
      $data[]=$thing;
  }   
  
  echo json_encode($data);
}
orderSearch($_GET['search'])






?>