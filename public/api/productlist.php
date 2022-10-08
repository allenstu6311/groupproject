<?php
//存入資料庫形成訂單
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");


function productList($mem_id,$productPrice,$cps_id,$totalPrice,$address){

  require_once("../../src/connect_cgd102g2.php"); //開發路徑
// require_once("../connect_cgd102g2.php");//上線路徑


$sql = "insert into PRODUCT_ORDERS VALUES(null,{$mem_id},1,now(),{$productPrice},{$cps_id},{$totalPrice},'{$address}') ";

$book = $pdo->query($sql);
echo  $pdo->lastInsertId();

}
productList($_GET['mem_id'],$_GET['productPrice'],$_GET['cps_id'],$_GET['totalPrice'],$_GET['address'])

?>
