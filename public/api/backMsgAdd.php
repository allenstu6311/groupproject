<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

// try{

//     require_once("../connect_cgd102g2.php"); //上線用
    
//     $sql = "SELECT * FROM MSG WHERE MSG_NAME = :MSG_NAME;";
//     $msgName = $pdo -> prepare($sql);
//     $msgName->bindValue(":MSG_NAME",$_POST["msg_name"]);
//     $msgName->execute();
    
//     if( $msgName->rowCount() == 0 ){ //找不到
//       //存入資料庫
//         $insertSql = "INSERT INTO MSG (MSG_NAME,MSG_INTRO,MSG_TIMESPAN_2,MSG_PRICE_2,MSG_REC_2,MSG_DESC,MSG_NOTICE,MSG_FAQ,MSG_PIC,MSG_STATUS)
//                 VALUES(':MSG_NAME',':MSG_INTRO',:MSG_TIMESPAN_2,:MSG_PRICE_2,':MSG_REC_2',':MSG_DESC',':MSG_NOTICE',':MSG_FAQ',':MSG_PIC',1);";
//         $msg = $pdo -> prepare($insertSql);
//         $msg->bindValue(":MSG_NAME",$_POST["msg_name"]);
//         $msg->bindValue(":MSG_INTRO",$_POST["msg_intro"]);
//         $msg->bindValue(":MSG_TIMESPAN_2",$_POST["msg_timespan_2"]);
//         $msg->bindValue(":MSG_PRICE_2",$_POST["msg_price_2"]);
//         $msg->bindValue(":MSG_REC_2",$_POST["msg_rec_2"]);
//         $msg->bindValue(":MSG_DESC",$_POST["msg_desc"]);
//         $msg->bindValue(":MSG_NOTICE",$_POST["msg_notice"]);
//         $msg->bindValue(":MSG_FAQ",$_POST["msg_faq"]);
//         $msg->bindValue(":MSG_PIC",$_POST["msg_pic"]);
//         $msg->execute();
//         echo 1;
//     }else{ //找得到
//       //傳回此按摩項目已存在
//         echo "無法建立按摩項目";
//     }	
// }catch(PDOException $e){
// echo $e->getMessage();
// }


function msgAdd($msg_name,$msg_intro,$msg_timespan_2,$msg_price_2,$msg_rec_2,$msg_desc,$msg_notice,$msg_faq){

  require_once("../connect_cgd102g2.php"); //上線用

    //存入資料庫
    $insertSql = "INSERT INTO MSG (MSG_NAME,MSG_INTRO,MSG_TIMESPAN_2,MSG_PRICE_2,MSG_REC_2,MSG_DESC,MSG_NOTICE,MSG_FAQ,MSG_PIC,MSG_STATUS)
    VALUES('{$msg_name}','{$msg_intro}',{$msg_timespan_2},{$msg_price_2},'{$msg_rec_2}','{$msg_desc}','{$msg_notice}','{$msg_faq}','{$msg_pic}',1);";

    $add = $pdo -> prepare($insertSql);
    echo 1;

}
msgAdd($_GET['msg_name'],$_GET['msg_intro'],$_GET['msg_timespan_2'],$_GET['msg_price_2'],$_GET['msg_rec_2'],$_GET['msg_desc'],$_GET['msg_notice'],$_GET['msg_faq'],$_GET['msg_pic'])

?>