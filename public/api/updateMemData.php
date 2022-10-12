<?php
    header('Access-Control-Allow-Origin:*');
    header("Content-Type:application/json;charset=utf-8");
    try{
      require_once("../connect_cgd102g2.php");
        // require_once("../connect_cgd102g2.php");//上線用
        $findMemSql = "UPDATE MEMBER
                       SET  MEM_NAME=:MEM_NAME,MEM_ACCOUNT=:ACCOUNT,MEM_PSW=:PSW,MEM_BIRTHDAY=:BIRTHDAY,MEM_PHONE=:PHONE,MEM_LOCALCALL=:LOCALCALL,MEM_EMAIL=:EMAIL,MEM_ADDRESS=:MEM_ADDRESS
                       WHERE MEM_ID=:MEM_ID";
        $updateMemData = $pdo -> prepare($findMemSql);
        $updateMemData->bindValue(":MEM_ID",$_POST["id"]);
        $updateMemData->bindValue(":MEM_NAME",$_POST["name"]);
        $updateMemData->bindValue(":ACCOUNT",$_POST["account"]);
        if($_POST["password"] != ''){
          $updateMemData->bindValue(":PSW",$_POST["password"]);
        }
        $updateMemData->bindValue(":BIRTHDAY",$_POST["birthday"]);
        $updateMemData->bindValue(":PHONE",$_POST["phone"]);
        $updateMemData->bindValue(":LOCALCALL",$_POST["localphone"]);
        $updateMemData->bindValue(":EMAIL",$_POST["email"]);
        $updateMemData->bindValue(":MEM_ADDRESS",$_POST["address"]);
        $updateMemData->execute();
      }catch(PDOException $e){
        echo $e->getMessage();
      }
?>