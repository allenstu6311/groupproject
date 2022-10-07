<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    require_once("../../src/connect_cgd102g2.php"); //開發路徑
    // require_once("../../connect_cgd102g2.php"); //上線用
    
    $sql = "SELECT * FROM THERAPIST WHERE THERAPIST_ACCOUNT = :ACCOUNT";
    $therapistAccount = $pdo -> prepare($sql);
    $therapistAccount->bindValue(":ACCOUNT",$_POST["account"]);
    $therapistAccount->execute();
    
    if( $therapistAccount->rowCount() == 0 ){ //找不到


      //存入資料庫
        $insertSql = "INSERT INTO THERAPIST (THERAPIST_LICENSE_1,THERAPIST_LICENSE_2,THERAPIST_LICENSE_3,THERAPIST_LICENSE_4,THERAPIST_PIC,THERAPIST_ACCOUNT,THERAPIST_PSW,THERAPIST_NAME,THERAPIST_HIREDATE,THERAPIST_STATUS)
                VALUES(:LICENSE_1,:LICENSE_2,:LICENSE_3,:LICENSE_4,:PIC,:ACCOUNT,:PSW,:THERAPIST_NAME,:HIREDATE,1)";
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
        echo "帳號已建立";
    }else{ //找得到
      //傳回此帳號已存在
        echo "無法建立帳號";
    }	
  }catch(PDOException $e){
    echo $e->getMessage();
  }

?>