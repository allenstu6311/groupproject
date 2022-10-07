<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    require_once("../../src/connect_cgd102g2.php"); //開發路徑
    // require_once("../../connect_cgd102g2.php"); //上線用
    
    $sql = "SELECT * FROM THERAPIST WHERE THERAPIST_ACCOUNT = :ACCOUNT"  select*from member whrer memid=1;
    $therapistAccount = $pdo -> prepare($sql);
    $therapistAccount->bindValue(":ACCOUNT",$_POST["account"]);
    $therapistAccount->execute();
    
    if( $therapistAccount->rowCount() == 1 ){ //找到帳號


      //存入資料庫
        $insertSql = "UPDATE THERAPIST SET 
        (
        THERAPIST_NAME = `:THERAPIST_NAME`,
        THERAPIST_ACCOUNT = `:ACCOUNT`,
        THERAPIST_PSW = `:PSW`,
        THERAPIST_LICENSE_1 = `:LICENSE_1`,
        THERAPIST_LICENSE_2 = `:LICENSE_2`,
        THERAPIST_LICENSE_3 = `:LICENSE_3`,
        THERAPIST_LICENSE_4 = `:LICENSE_4`,
        THERAPIST_HIREDATE = `:HIREDATE`,
        THERAPIST_PIC = `:PIC`,
        )
        WHERE THERAPIST_ACCOUNT = `:ACCOUNT`";

        $therapist = $pdo -> prepare($insertSql);
        $therapist->bindValue(":LICENSE_1",$_POST["license1"]);
        $therapist->bindValue(":LICENSE_2",$_POST["license2"]);
        $therapist->bindValue(":LICENSE_3",$_POST["license3"]);
        $therapist->bindValue(":LICENSE_4",$_POST["license4"]);
        $therapist->bindValue(":PIC",$_POST["pic"]);
        $therapist->bindValue(":ACCOUNT",$_POST["account"]);
        $therapist->bindValue(":PSW",$_POST["password"]);
        $therapist->bindValue(":THERAPIST_NAME",$_POST["name"]);
        $therapist->bindValue(":HIREDATE",$_POST["hiredate"]);
        $therapist->execute();
        echo "修改成功";
    }else{ //找不到
      //傳回未修改成功
        echo "修改失敗";
    }	
  }catch(PDOException $e){
    echo $e->getMessage();
  }

?>