<?php
//存入資料庫形成訂單
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");


function productOrder($order_id,$prod_id,$prod_price,$prod_num){

require_once("../../connect_cgd102g2.php");


$sql = "insert into ORDER_ITEMS VALUES(null,{$order_id},{$prod_id},{$prod_price},{$prod_num}) ";

$book = $pdo->query($sql);
echo  $pdo->lastInsertId();

}
productOrder($_GET['order_id'],$_GET['prod_id'],$_GET['prod_price'],$_GET['prod_num'])




?>
