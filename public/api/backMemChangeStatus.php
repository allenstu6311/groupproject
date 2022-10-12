<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    // require_once("../../src/connect_cgd102g2.php"); //開發路徑
    require_once("../connect_cgd102g2.php");//上線用

    //更改DB資料
      $updateSql = "UPDATE MEMBER 
                    SET MEM_PERMISSION = :PERMISSION
                    WHERE MEM_ID = :ID;";
      $memberstatus = $pdo -> prepare($updateSql);
      $memberstatus->bindValue(":ID",$_POST["ID"]);
      $memberstatus->bindValue(":PERMISSION",$_POST["permission"]);
      $memberstatus->execute();

  }catch(PDOException $e){
    echo $e->getMessage();
  }

?>