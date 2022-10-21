<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");


try{
    require_once("../connect_cgd102g2.php");

    $sql = "SELECT * FROM MSG WHERE MSG_ID = :MSG_ID";
    
    $msgAccount = $pdo -> prepare($sql);
    $msgAccount->bindValue(":MSG_ID",$_POST["MSG_ID"]);
    $msgAccount->execute();
        
    if( $msgAccount->rowCount() == 0 ){ //找不到MSG_ID
            //傳回未修改成功
            echo "修改失敗";

    }else{ //找到
        //存入資料庫
        $updateSql = "UPDATE MSG 
                        SET 
                        MSG_NAME = :MSG_NAME,
                        WHERE MSG_ID = :MSG_ID";

        $msg = $pdo -> prepare($updateSql);
        $msg->bindValue(":MSG_NAME",$_POST["MSG_NAME"]);
        $msg->bindValue(":MSG_INTRO",$_POST["MSG_INTRO"]);
        $msg->bindValue(":MSG_PRICE_2",$_POST["MSG_PRICE_2"]);
        $msg->bindValue(":MSG_REC_2",$_POST["MSG_REC_2"]);
        $msg->bindValue(":MSG_DESC",$_POST["MSG_DESC"]);
        $msg->bindValue(":MSG_PIC",$_POST["MSG_PIC"]);
        $msg->execute();
        echo "修改成功";
    }	

}catch(PDOException $e){
    echo $e->getMessage();
}
?>