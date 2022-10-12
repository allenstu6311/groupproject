<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");


    try{

        // require_once("../../src/connect_cgd102g2.php"); //開發路徑
        require_once("../connect_cgd102g2.php"); //上線用
    
        $sql = "SELECT * FROM NEWS";
        $new = $pdo->query($sql);
    
        if($new->rowCount()==0){
            echo "無消息資料";
            // exit();
        }else{
            $news = $new->fetchAll(PDO::FETCH_ASSOC);
            $data = [];
    
            foreach($news as $i => $page){
            

            $data[] = $page;
            }
    
            echo json_encode($data);

        }
    }catch (Exception $e) {
            echo "錯誤行號 : ", $e->getLine(), "<br>";
            echo "錯誤原因 : ", $e->getMessage(), "<br>";
            //echo "系統暫時不能正常運行，請稍後再試<br>";	
    }

?>
