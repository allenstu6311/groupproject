<?php
//存入資料庫形成訂單
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");


function productOrder(){

require_once("../../connect_cgd102g2.php");


$sql = "insert into PRODUCT_ORDERS VALUES(2,2,1,''9999-12-31 23:59:59',) ";

$book = $pdo->query($sql);

}
productOrder()

?>
