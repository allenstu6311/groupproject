
<?php 

header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    require_once("../connect_cgd102g2.php");

    
    $insertSql = "INSERT INTO RESV2 (THERAPIST_ID, MSG_ID, RESV_DATE, RESV_TIME_START, RESV_TIME_END, RESV_STATUS)
                  VALUES(:THERAPIST_ID, :MSG_ID, :RESV_DATE, :RESV_TIME_START, :RESV_TIME_END, 0);";
    $resv = $pdo -> prepare($insertSql);
    // $resv->bindValue(":RESV_ID",$_POST["1"]); 自動創好就不用寫嗎
    // $resv->bindValue(":MEM_ID",$_POST["1"]);
    $resv->bindValue(":THERAPIST_ID",$_POST["THERAPIST_ID"]);
    $resv->bindValue(":MSG_ID",$_POST["MSG_ID"]);
    $resv->bindValue(":RESV_DATE",$_POST["RESV_DATE"]);
    $resv->bindValue(":RESV_TIME_START",$_POST["RESV_TIME_START"]);
    $resv->bindValue(":RESV_TIME_END",$_POST["RESV_TIME_END"]);
    $resv->execute();
    echo 1;
    // echo json_encode("預約成功");
    // VALUES(:RESV_ID,:MEM_ID,:THERAPIST_ID,:MSG_ID,:RESV_DATE,:RESV_TIME_START,:RESV_TIME_END,0);";

}catch(PDOException $e){
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
}


?>
