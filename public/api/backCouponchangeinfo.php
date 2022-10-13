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
    
    if( $couponId->rowCount() == 0 ){ 
      //傳回未修改成功
      echo"修改失敗";
    }else{//找到
      //存入資料庫
      $updateSql = "UPDATE COUPONS SET 
        CPS_ID = :ID,
        CPS_NAME = :CPS_NAME,
        CPS_DIS = :DISCOUNT
        WHERE CPS_ID = :ID;";

        $coupon = $pdo -> prepare($updateSql);
        $coupon->bindValue(":ID",$_POST["id"]);
        $coupon->bindValue(":CPS_NAME",$_POST["name"]);
        $coupon->bindValue(":DISCOUNT",$_POST["discount"]);
        $coupon->execute();
        echo "修改成功";
    }
  }catch(PDOException $e){
    echo $e->getMessage();
  }

?>