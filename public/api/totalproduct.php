<?php

header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");


function page($range_1,$range_2){
    // require_once("../connect_cgd102g2.php"); //開發路徑
    require_once("../connect_cgd102g2.php");//上線路徑

$sql="select*from PRODUCT limit {$range_1},{$range_2}";

// $sql = "DELETE FROM PRODUCT
// WHERE PROD_ID>15";


$product=$pdo->query($sql);

$products= $product->fetchAll();

$data=[];
foreach($products as $i=>$thing){
    $data[]=$thing;
}

echo json_encode($data);

}

page($_GET['range_1'],$_GET['range_2'])




?>