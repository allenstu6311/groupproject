<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    require_once("../connect_cgd102g2.php"); //上線用
    // require_once("../../connect_cgd102g2.php"); //開發路徑


    //更改DB資料
    $updateSql = "UPDATE THERAPIST 
                  SET THERAPIST_STATUS = ':STATUS'
                  WHERE THERAPIST_ACCOUNT = ':ACCOUNT'";

    $therapist = $pdo -> prepare($updateSql);
    $therapist->bindValue(":ACCOUNT",$_POST["account"]);
    $therapist->bindValue(":STATUS",$_POST["status"]);
    $therapist->execute();
    echo "狀態修改成功";

  }catch(PDOException $e){
    echo $e->getMessage();
  }

?>