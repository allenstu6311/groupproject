<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");


require_once("../connect_cgd102g2.php");//上線路徑

$sql="SELECT R.RESV_ID, M.MEM_ID, M.MEM_NAME, R.RESV_DATE, MSG.MSG_NAME, T.THERAPIST_NAME, MSG.MSG_PRICE_2, R.RESV_TIME_START, MSG.MSG_TIMESPAN_2, R.RESV_TIME_END, R.RESV_STATUS
        FROM RESV R 
        JOIN MEMBER M 
        ON R.MEM_ID=M.MEM_ID
        JOIN THERAPIST T 
        ON R.THERAPIST_ID=T.THERAPIST_ID
        JOIN MSG
        ON R.MSG_ID=MSG.MSG_ID
        ORDER BY R.RESV_ID DESC
        ;";

  
  $info = $pdo->query($sql);
  
  $infos = $info->fetchAll();
  
  $data=[];
  
  foreach($infos as $i=>$thing){
      $data[]=$thing;
  }   
  
  echo json_encode($data);

?>