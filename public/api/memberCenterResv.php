<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function getMemberId($mem_id){
      // require_once("../../src/connect_cgd102g2.php"); //開發路徑
  require_once("../connect_cgd102g2.php");//上線路徑

//   $sql="SELECT  POD.PROD_ORDERS_ID,POD.PROD_ORDERS_DATE,M.MEM_NAME,POD.PROD_ORDERS_STATUS
//   FROM PRODUCT_ORDERS POD JOIN MEMBER M 
//   ON POD.MEM_ID=M.MEM_ID
//   WHERE POD.MEM_ID={$mem_id}
//   ORDER BY POD.PROD_ORDERS_DATE;";


// $sql="SELECT R.RESV_ID,R.RESV_DATE,M.MEM_NAME,R.RESV_STATUS
//         FROM RESV R JOIN MEMBER M 
//         ON R.MEM_ID=M.MEM_ID
//         WHERE R.MEM_ID={$mem_id}
//         ORDER BY R.RESV_DATE;";


$sql="SELECT R.RESV_DATE, MSG.MSG_NAME, T.THERAPIST_NAME, MSG.MSG_PRICE_2, R.RESV_TIME_START, MSG.MSG_TIMESPAN_2
        FROM RESV R 
        JOIN MEMBER M 
        ON R.MEM_ID=M.MEM_ID
		JOIN THERAPIST T 
        ON R.THERAPIST_ID=T.THERAPIST_ID
		JOIN MSG
        ON R.MSG_ID=MSG.MSG_ID
        WHERE R.MEM_ID={$mem_id}
        ORDER BY R.RESV_DATE
        ;";

  
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