<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../../connect_cgd102g2.php"); //連接的鑰匙

$sql = "select * from PRODUCT  limit 0,4"; //取資料庫的 PRODUCT table 只取最多4個

$product = $pdo->query($sql); //建立變數

$products = $product->fetchAll(); //建立變數存取物件們

$data=[];

foreach($products as $i=>$someThing){
    $data[]=$someThing;
}

echo json_encode($data);




?>