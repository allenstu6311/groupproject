<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function memberInfo($MEM_ID){

    //   require_once("../../src/connect_cgd102g2.php"); //開發路徑
      require_once("../connect_cgd102g2.php");//上線路徑

$sql = "SELECT M.MEM_NAME ,MC.MEM_ID,MC.CPS_ID ,CS.CPS_NAME,CS.CPS_DIS,MC.MY_COUPONS_STATUS FROM  `MEMBER` M 
JOIN MY_COUPONS MC 
ON M.MEM_ID = MC.MEM_ID
JOIN COUPONS C 
ON MC.CPS_ID =  C.CPS_ID
JOIN COUPONS CS
ON  MC.CPS_ID = CS.CPS_ID 
WHERE M.MEM_ID={$MEM_ID} AND MY_COUPONS_STATUS=1";

$book = $pdo->query($sql);

$books = $book->fetchAll();

$data=[];

foreach($books as $i=> $page){
    $data[]=$page;
}
echo json_encode($data);

}

memberInfo($_GET['MEM_ID'])

?>





