<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
session_start();
try{
  require_once("../../src/connect_cgd102g2.php");
    // require_once("../connect_cgd102g2.php");//上線用
    $findExistSql = "SELECT * 
            FROM member 
            WHERE MEM_ACCOUNT=:ACCOUNT
            AND MEM_PSW=:PSW";
    $existAccount = $pdo -> prepare($findExistSql);
    $existAccount->bindValue(":ACCOUNT",$_POST["account"]);
    $existAccount->bindValue(":PSW",$_POST["password"]);
    $existAccount->execute();
    
    if( $existAccount->rowCount() == 0 ){ //找不到
        echo "帳號密碼有誤";
    }else{ //找得到
      //取回會員資料，存入session
        $memData = $existAccount->fetch(PDO::FETCH_ASSOC);
        $_SESSION["memName"] = $memData["MEM_NAME"];
        $_SESSION["memAccount"] = $memData["MEM_ACCOUNT"];
        $_SESSION["memBirthday"] = $memData["MEM_BIRTHDAY"];
        $_SESSION["memAddress"] = $memData["MEM_ADDRESS"];
        $_SESSION["memPhone"] = $memData["MEM_PHONE"];
        $_SESSION["memLocalCall"] = $memData["MEM_LOCALCALL"];
        $_SESSION["memEmail"] = $memData["MEM_EMAIL"];
        //送出登入者的資料
        $result = ["memName"=>$_SESSION["memName"],
                   "memAccount"=>$_SESSION["memAccount"],
                   "memBirthday"=>$_SESSION["memBirthday"],
                   "memAddress"=>$_SESSION["memAddress"],
                   "memPhone"=>$_SESSION["memPhone"],
                   "memLocalCall"=>$_SESSION["memLocalCall"],
                   "memEmail"=>$_SESSION["memEmail"],
                  ];
        echo json_encode($result);
    }	
  }catch(PDOException $e){
    echo $e->getMessage();
  }
?>