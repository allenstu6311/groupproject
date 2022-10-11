<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
// require_once("../../src/connect_cgd102g2.php");//開發用
require_once("../connect_cgd102g2.php");//上線用
$getSql = "select * from MEMBER";
$getmemberdata = $pdo->query($getSql);
$memberdata = $getmemberdata->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($memberdata);
?>