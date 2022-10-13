<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
session_start();
try{
//   require_once("../../src/connect_cgd102g2.php");//開發用
    require_once("../connect_cgd102g2.php");//上線用
    $findExistSql = "SELECT * 
            FROM ADMINISTRATOR
            WHERE ADMIN_ACCOUNT=:ACCOUNT
            AND ADMIN_PSW=:PSW";
    $existAccount = $pdo -> prepare($findExistSql);
    $existAccount->bindValue(":ACCOUNT",$_POST["account"]);
    $existAccount->bindValue(":PSW",$_POST["password"]);
    $existAccount->execute();
    
    if( $existAccount->rowCount() == 0 ){ //找不到
        echo "0";
    }else{ //找得到
      //取回會員資料，存入session
        $memData = $existAccount->fetch(PDO::FETCH_ASSOC);
        $_SESSION["adminName"] = $memData["ADMIN_NAME"];
        //送出登入者的資料
        $result = ["adminName"=>$_SESSION["adminName"],];
        echo json_encode($result);
    }	
  }catch(PDOException $e){
    echo $e->getMessage();
  }
?>