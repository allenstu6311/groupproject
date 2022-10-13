<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
try{
require_once("../../src/connect_cgd102g2.php"); //開發用
// require_once("../connect_cgd102g2.php");//上線用
$getSql = "INSERT INTO ADMINISTRATOR(ADMIN_ACCOUNT,ADMIN_PSW, ADMIN_NAME) 
           VALUES(:ACCOUNT,:PSW,:ADMIN_NAME)";
$getManageData = $pdo->prepare($getSql);
$getManageData->bindValue(":ACCOUNT",$_POST["account"]);
$getManageData->bindValue(":PSW",$_POST["password"]);
$getManageData->bindValue(":ADMIN_NAME",$_POST["name"]);
$getManageData->execute();
echo 1;
}catch(PDOException $e){
    echo $e->getMessage();
}
?>