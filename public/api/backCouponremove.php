<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    require_once("../connect_cgd102g2.php"); //上線用
    // require_once("../../connect_cgd102g2.php"); //開發路徑
    
    $sql = "SELECT * FROM COUPONS WHERE CPS_ID = ':ID'";
    $couponId = $pdo -> prepare($sql);
    $couponId->bindValue(":ID",$_POST["id"]);
    $couponId->execute();
    
    if( $couponId->rowCount() == 0 ){ //找不到
      echo "無法刪除折價券";


        
    }else{ 

        $deleteSql = "DELETE FROM COUPONS WHERE CPS_ID = ':ID'";
        $coupon = $pdo -> prepare($deleteSql);
        $coupon->bindValue(":ID",$_POST["id"]);
        $coupon->bindValue(":CPS_NAME",$_POST["name"]);
        $coupon->bindValue(":DISCOUNT",$_POST["discount"]);
        $coupon->execute();
        echo "折價券已刪除";
        
    }	
  }catch(PDOException $e){
    echo $e->getMessage();
  }

?>