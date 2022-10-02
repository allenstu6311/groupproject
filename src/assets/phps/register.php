<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
try{
    require_once("../../connect_cgd102g2.php");
    $sql1 = "SELECT * 
            FROM member 
            WHERE MEM_NAME=:MEM_NAME 
            AND MEM_ACCOUNT=:ACCOUNT 
            AND MEM_PSW=:PSW 
            AND MEM_BIRTHDAT:BIRTHDAT 
            AND MEM_ADDRESS=:MEM_ADDRESS 
            AND MEM_PHONE=:PHONE 
            AND MEM_LOCALCALL=:LOCALCALL 
            AND MEM_EMAIL=:EMAIL";
    $member = $pdo -> prepare($sql1);
    $member->bindValue(":MEM_NAME",$_POST["name"]);
    $member->bindValue(":ACCOUNT",$_POST["account"]);
    $member->bindValue(":PSW",$_POST["password"]);
    $member->bindValue(":BIRTHDAT",$_POST["birthday"]);
    $member->bindValue(":MEM_ADDRESS",$_POST["address"]);
    $member->bindValue(":PHONE",$_POST["phone"]);
    $member->bindValue(":LOCALCALL",$_POST["localphone"]);
    $member->bindValue(":EMAIL",$_POST["email"]);
    $member->execute();
    
    if( $member->rowCount() == 0 ){ //找不到
      //存入資料庫
      $sql = "INSERT INTO member(MEM_NAME,MEM_ACCOUNT,MEM_PSW,MEM_BIRTHDAY,MEM_ADDRESS,MEM_PHONE,MEM_LOCALCALL,MEM_EMAIL)
              VALUES(:MEM_NAME,:ACCOUNT,:PSW,:BIRTHDAT,:MEM_ADDRESS,:PHONE,:LOCALCALL,:EMAIL)";
    }else{ //找得到
      //傳回此帳號已存在
      echo "此帳號已存在";
    }	
  }catch(PDOException $e){
    echo $e->getMessage();
  }

// $account = $_GET["account"];
// $password = $_GET["password"];
// $name = $_GET["name"];
// $email = $_GET["email"];
// $birthday = $_GET["birthday"];
// $phone = $_GET["phone"];
// $localphone = $_GET["localphone"];
// $address = $_GET["address"];

// $sql1 = "SELECT * FROM member WHERE MEM_ACCOUNT='$account'";
// $resultList = mysql_query($sql1);
// $item = mysql_fetch_array($resultList);

// $result = array();

// if($item[0]>0){
//     $result["code"]=0;
//     $result["msg"]="帳號已有此人";
// }else{
//     $sql = "INSERT INTO member(MEM_NAME,MEM_ACCOUNT,MEM_PSW,MEM_BIRTHDAY,MEM_ADDRESS,MEM_PHONE,MEM_LOCALCALL,MEM_EMAIL)
//             VALUES('$name','$account','$password','$birthday','$address','$phone','$localphone','$email')";
//     mysql_query($sql);

//     $count = mysql_affected_rows();

//     if($count>0){
//         $result["code"]=1;
//         $result["msg"]="成功";
//     }else{
//         $result["code"] = 0;
//         $result["msg"] = "失敗";
//     }
// }

// echo json_encode($result);
?>