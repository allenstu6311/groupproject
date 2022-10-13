<?php

header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");


function delCoupons($mem_id,$cps_id){

    require_once("../../src/connect_cgd102g2.php"); //開發路徑
    require_once("../connect_cgd102g2.php");//上線路徑

    $sql="UPDATE MY_COUPONS SET MY_COUPONS_STATUS=0 WHERE MEM_ID={$mem_id} AND CPS_ID={$cps_id}";
    $pdo->query($sql);

}

delCoupons($_GET['mem_id'],$_GET['cps_id'])

?>