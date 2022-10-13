<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
try{
// require_once("../../src/connect_cgd102g2.php"); //開發用
require_once("../connect_cgd102g2.php");//上線用
$dropSql = "DELETE FROM ADMINISTRATOR
            WHERE ADMIN_ID IN (:DROPADMIN)";
$dropAdmin = $pdo->prepare($dropSql);
$dropAdmin->bindValue(":DROPADMIN",$_POST["checked"]);
$dropAdmin->execute();
echo 1;
}catch(PDOException $e){
    echo $e->getMessage();
}
?>