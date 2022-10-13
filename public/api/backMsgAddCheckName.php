<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    require_once("../connect_cgd102g2.php"); //上線用

    $sql = "SELECT MSG_INTRO FROM MSG WHERE MSG_NAME = ? "; //？表示未知數 不知道送來的MSG_NAME等於什麼
    $msg = $pdo -> prepare($sql);
    //利用pdo prepare功能去編譯sql指令，會產生一個 pdo statement
    $msg->bindValue(1, $_GET["MSG_NAME"]); //綁定第一個問號
    $msg->execute();

    if( $msg->rowCount() !=0){
        echo "此按摩項目名稱已存在，不可用"; //server response = 用php echo出去
    }else{
        echo "此按摩項目名稱可使用";
    }
    
    // $sql = "SELECT * FROM MSG WHERE MSG_NAME = :NAME";
    // $msgName = $pdo -> prepare($sql);
    // $msgName->bindValue(":NAME",$_POST["name"]);
    // $msgName->execute();
    
    // if( $msgName->rowCount() == 0 ){ //找不到


    //   //存入資料庫
    //     $insertSql = "INSERT INTO MSG (MSG_NAME,MSG_INTRO,MSG_PRICE_1,MSG_REC_1,MSG_PRICE_2,MSG_REC_2,MSG_DESC,MSG_PIC,MSG_STATUS)
    //             VALUES(:MSG_NAME,:MSG_INTRO,:MSG_PRICE_1,:MSG_REC_1,:MSG_PRICE_2,:MSG_REC_2,:MSG_DESC,:MSG_PIC,1)";
    //     $msg = $pdo -> prepare($insertSql);
    //     $msg->bindValue(":MSG_NAME",$_POST["msg_name"]);
    //     $msg->bindValue(":MSG_INTRO",$_POST["msg_intro"]);
    //     $msg->bindValue(":MSG_PRICE_1",$_POST["msg_price_1"]);
    //     $msg->bindValue(":MSG_REC_1",$_POST["msg_rec_1"]);
    //     $msg->bindValue(":MSG_PRICE_2",$_POST["msg_price_2"]);
    //     $msg->bindValue(":MSG_REC_2",$_POST["msg_rec_2"]);
    //     $msg->bindValue(":MSG_DESC",$_POST["msg_desc"]);
    //     $msg->bindValue(":MSG_PIC",$_POST["msg_pic"]);
    //     $msg->execute();
    //     echo "按摩項目已建立";
    // }else{ //找得到
    //   //傳回此按摩項目已存在
    //     echo "無法建立按摩項目";
    // }	
}catch(PDOException $e){
echo $e->getMessage();
}

?>