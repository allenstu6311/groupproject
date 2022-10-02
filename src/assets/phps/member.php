<?php


header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../../connect_cgd102g2.php");


$sql = "select M.MEM_NAME ,MC.MEM_ID,MC.CPS_ID ,CS.CPS_NAME,CS.CPS_DIS from  `MEMBER` M 
JOIN my_coupons MC 
ON M.MEM_ID = MC.MEM_ID
JOIN coupons C 
ON MC.CPS_ID =  C.CPS_ID
JOIN coupons CS
ON  MC.CPS_ID = CS.CPS_ID ";

$book = $pdo->query($sql);

$books = $book->fetchAll();

$data=[];

foreach($books as $i=> $page){

?>
<?php

    $data[]=$page;
}
echo json_encode($data);

?>



