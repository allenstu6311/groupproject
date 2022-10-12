<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    // require_once("../../connect_cgd102g2.php"); //開發路徑
    require_once("../connect_cgd102g2.php"); //上線用

    //更改DB資料
    $updateSql = "UPDATE THERAPIST 
                  SET THERAPIST_STATUS = :STA
                  WHERE THERAPIST_ACCOUNT = :ACC;";

    $therapist = $pdo -> prepare($updateSql);
    $therapist->bindValue(":ACC",$_POST["account"]);
    $therapist->bindValue(":STA",$_POST["status"]);
    $therapist->execute();
    echo "狀態修改成功";

}catch(PDOException $e){
    echo $e->getMessage();
}

?>