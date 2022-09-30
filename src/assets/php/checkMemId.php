<?php
try{
    require_once("../../connect_cgd102g2.php");
  
    $sql = "select * from member where MEM_ACCOUNT = ?";
    $member = $pdo->prepare($sql);
    $member->bindValue(1, $_POST["MEM_ACCOUNT"]);
    $member->execute();
  
  
    if( $member->rowCount() != 0){ //此帳號已存在, 不可用
      echo "此帳號已存在, 不可用";
    }else{ //此帳號可使用
      echo "此帳號可使用";
    } 
  }catch(PDOException $e){
    echo "error";
  }
  ?>