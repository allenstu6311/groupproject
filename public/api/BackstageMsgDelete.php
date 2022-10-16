<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");



    function msgId($msg_id){


    // require_once("../../src/connect_cgd102g2.php"); //開發路徑
    require_once("../connect_cgd102g2.php"); //上線用

    $sql = "DELETE FROM MSG WHERE MSG_ID = {$msg_id}";

    $pdo->query($sql); 



	}
    msgId($_GET['msg_id'])

?>