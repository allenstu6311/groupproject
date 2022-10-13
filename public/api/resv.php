
<?php 

header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    require_once("../connect_cgd102g2.php");

    
    $insertSql = "INSERT INTO RESV (MEM_ID, THERAPIST_ID, MSG_ID, RESV_DATE, RESV_TIME_START, RESV_TIME_END, RESV_STATUS)
                  VALUES(:MEM_ID, :THERAPIST_ID, :MSG_ID, :RESV_DATE, :RESV_TIME_START, :RESV_TIME_END, 0);";
    $resv = $pdo -> prepare($insertSql);

    $resv->bindValue(":MEM_ID",$_POST["MEM_ID"]);
    $resv->bindValue(":THERAPIST_ID",$_POST["THERAPIST_ID"]);
    $resv->bindValue(":MSG_ID",$_POST["MSG_ID"]);
    $resv->bindValue(":RESV_DATE",$_POST["RESV_DATE"]);
    $resv->bindValue(":RESV_TIME_START",$_POST["RESV_TIME_START"]);
    $resv->bindValue(":RESV_TIME_END",$_POST["RESV_TIME_END"]);
    $resv->execute();
    echo 1;

}catch(PDOException $e){
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
}


?>
