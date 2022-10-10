<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

// function checkName($searchName){
    try{

        require_once("../connect_cgd102g2.php"); //上線用
    
        // $sql = "SELECT * FROM MSG WHERE MSG_NAME ='全身穴道按摩'";
        $sql = "SELECT * FROM MSG";
        $msg = $pdo->query($sql);
    
        if($msg->rowCount()==0){
            echo "無按摩項目資料";
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

// }
// checkName($_GET['searchName'])

?>
