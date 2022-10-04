<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
try{
    require_once("../../connect_cgd102g2.php");
    $findExistSql = "SELECT * 
            FROM member 
            WHERE MEM_ACCOUNT=:ACCOUNT";
    $existAccount = $pdo -> prepare($findExistSql);
    $existAccount->bindValue(":ACCOUNT",$_POST["account"]);
    $existAccount->execute();
    
    if( $existAccount->rowCount() == 0 ){ //找不到
      //存入資料庫
        $insertSql = "INSERT INTO member(MEM_NAME,MEM_ACCOUNT,MEM_PSW,MEM_BIRTHDAY,MEM_ADDRESS,MEM_PHONE,MEM_LOCALCALL,MEM_EMAIL,MEM_PERMISSION)
                VALUES(:MEM_NAME,:ACCOUNT,:PSW,:BIRTHDAY,:MEM_ADDRESS,:PHONE,:LOCALCALL,:EMAIL,1)";
        $member = $pdo -> prepare($insertSql);
        $member->bindValue(":MEM_NAME",$_POST["name"]);
        $member->bindValue(":ACCOUNT",$_POST["account"]);
        $member->bindValue(":PSW",$_POST["password"]);
        $member->bindValue(":BIRTHDAY",$_POST["birthday"]);
        $member->bindValue(":MEM_ADDRESS",$_POST["address"]);
        $member->bindValue(":PHONE",$_POST["phone"]);
        $member->bindValue(":LOCALCALL",$_POST["localphone"]);
        $member->bindValue(":EMAIL",$_POST["email"]);
        $member->execute();
        echo "註冊成功";
    }else{ //找得到
      //傳回此帳號已存在
        echo "此帳號已存在";
    }	
  }catch(PDOException $e){
    echo $e->getMessage();
  }

?>