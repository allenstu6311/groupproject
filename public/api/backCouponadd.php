<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    require_once("../connect_cgd102g2.php"); //上線用
    // require_once("../../connect_cgd102g2.php"); //開發路徑
    
    $sql = "SELECT * FROM COUPONS WHERE CPS_ID = :ID";
    $couponId = $pdo -> prepare($sql);
    $couponId->bindValue(":ID",$_POST["id"]);
    $couponId->execute();
    
    if( $couponId->rowCount() == 0 ){ //找不到


      //存入資料庫
        $insertSql = "INSERT INTO COUPONS (CPS_ID,CPS_NAME,CPS_DIS)
          VALUES(:ID,:CPS_NAME,:DISCOUNT)";
        $coupon = $pdo -> prepare($insertSql);
        $coupon->bindValue(":ID",$_POST["id"]);
        $coupon->bindValue(":CPS_NAME",$_POST["name"]);
        $coupon->bindValue(":DISCOUNT",$_POST["discount"]);
        $coupon->execute();
        echo "折價券已建立";
    }else{ //找得到
      //傳回此帳號已存在
        echo "無法建立折價券";
    }	
  }catch(PDOException $e){
    echo $e->getMessage();
  }

?>