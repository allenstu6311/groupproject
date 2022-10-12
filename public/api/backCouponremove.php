<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

  function couponId($coupon_id){

    // require_once("../../src/connect_cgd102g2.php"); //開發路徑
    require_once("../connect_cgd102g2.php"); //上線用

    $sql = "DELETE FROM COUPONS WHERE CPS_ID = {$coupon_id}";

    $pdo->query($sql);   //執行資料庫一定要寫

  }
  couponId($_GET['coupon_id'])

?>