<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../../connect_cgd102g2.php");

$sql="select * from PRODUCT_ORDERS limit 0,10";

$info = $pdo->query($sql);

$infos = $info->fetchAll();

$data=[];

foreach($infos as $i=>$thing){
    $data[]=$thing;
}   

echo json_encode($data);



?>