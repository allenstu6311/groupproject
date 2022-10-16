<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function getMsgId($msg_id){

    require_once("../connect_cgd102g2.php"); //上線用

    $sql = "SELECT * FROM MSG WHERE MSG_ID={$msg_id}";
    $msg = $pdo->query($sql);

    $msgs = $msg->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($msgs);

}
getMsgId($_GET['msg_id'])

?>
