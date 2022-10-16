<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function backSearch($MSG_NAME){
    // require_once("../connect_cgd102g2.php"); //開發路徑
    require_once("../connect_cgd102g2.php"); //上線用
    
    $sql="SELECT * FROM MSG WHERE MSG_NAME LIKE '%{$MSG_NAME}%';";

    $msg = $pdo->query($sql);

    $msgs = $msg->fetchAll(PDO::FETCH_ASSOC);

    $data=[];

    foreach($msgs as $i=>$thing){
        $data[] = $thing;
    }
    echo json_encode($data);

}
backSearch($_GET['MSG_NAME'])

?>