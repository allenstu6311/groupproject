<?php
//所有加購區商品
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

// require_once("../../src/connect_cgd102g2.php"); //開發路徑
require_once("../connect_cgd102g2.php");//上線路徑

$sql = "select * from product";
$product = $pdo->query($sql);
$products = $product->fetchAll();

$data=[];

foreach($products as $i=>$thing){
    $data[]=$thing;
}
echo json_encode($data)
?>