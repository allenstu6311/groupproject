<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

    function getMsgId($msg_id){

 
        require_once("../connect_cgd102g2.php"); //上線用

    
        $sql = "SELECT * FROM MSG WHERE MSG_ID={$msg_id}";
        $msg = $pdo->query($sql);

        $msgs = $msg->fetchAll();

        echo  json_encode($msgs);

        
    
        // $msgAccount = $pdo -> prepare($sql);
        // $msgAccount->bindValue("1",$_POST["MSG_NAME"]);
        // $msgAccount->execute();
        
        // if( $msgAccount->rowCount() == 1 ){ //找到帳號
    
    
        //   //存入資料庫
        //     $insertSql = "UPDATE MSG SET 
        //     (
        //     MSG_NAME = `:MSG_NAME`,
        //     )
        //     WHERE MSG_ACCOUNT = `:ACCOUNT`";
    
        //     $msg = $pdo -> prepare($insertSql);
        //     $msg->bindValue(":MSG_NAME",$_POST["MSG_NAME"]);
        //     $msg->bindValue(":MSG_INTRO",$_POST["MSG_INTRO"]);
        //     $msg->bindValue(":MSG_PRICE_1",$_POST["MSG_PRICE_1"]);
        //     $msg->bindValue(":MSG_REC_1",$_POST["MSG_REC_1"]);
        //     $msg->bindValue(":MSG_PRICE_2",$_POST["MSG_PRICE_2"]);
        //     $msg->bindValue(":MSG_REC_2",$_POST["MSG_REC_2"]);
        //     $msg->bindValue(":MSG_DESC",$_POST["MSG_DESC"]);
        //     $msg->bindValue(":MSG_PIC",$_POST["MSG_PIC"]);
        //     $msg->execute();
        //     echo "修改成功";
        // }else{ //找不到
        //   //傳回未修改成功
        //     echo "修改失敗";
        // }	
      
    }
    getMsgId($_GET['msg_id'])
  

?>