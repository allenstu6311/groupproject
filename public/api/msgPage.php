<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function msgId($msg_id){
  
    try{
        // require_once("../../src/connect_cgd102g2.php"); //開發路徑
        require_once("../connect_cgd102g2.php"); //上線用
    
        $sql = "SELECT * FROM MSG WHERE MSG_ID={$msg_id}";
        $msg = $pdo->query($sql);
    
        if($msg->rowCount()==0){
            echo "無按摩師資料";
            // exit();
        }else{
            $msgs = $msg->fetchAll(PDO::FETCH_ASSOC);
            $data = [];
    
            foreach($msgs as $i => $page){
                $data[] = $page;
            }
    
            echo json_encode($data);
    
        }
    }catch (Exception $e) {
            echo "錯誤行號 : ", $e->getLine(), "<br>";
            echo "錯誤原因 : ", $e->getMessage(), "<br>";
            //echo "系統暫時不能正常運行，請稍後再試<br>";	
    }
}
msgId($_GET['msg_id'])
?>