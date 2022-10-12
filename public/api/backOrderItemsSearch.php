<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
function search(){
      // require_once("../../src/connect_cgd102g2.php"); //開發路徑
  require_once("../connect_cgd102g2.php");//上線路徑

  $sql="SELECT  * FROM ";
  
  $info = $pdo->query($sql);
  
  $infos = $info->fetchAll();
  
  $data=[];
  
  foreach($infos as $i=>$thing){
      $data[]=$thing;
  }   
  
  echo json_encode($data);

}




?>