<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    require_once("../connect_cgd102g2.php"); //開發路徑
    //require_once("../connect_cgd102g2.php");//上線路徑

    $findCpsSql = "SELECT * FROM MY_COUPONS";
    
    $getCount = $pdo -> query($findCpsSql);
    // $getCount->execute();

    if($getCount->rowCount()==0){
        echo "答對零題";
        // exit();
    }else{
        $getCount = $getCount->fetchAll(PDO::FETCH_ASSOC);
        $data = [];

        foreach($getCount as $i => $page){
        
        ?>
        <?php
        $data[] = $page;
        }

        echo json_encode($data);
        ?>
        <?php
    }
}catch (Exception $e) {
        echo "錯誤行號 : ", $e->getLine(), "<br>";
        echo "錯誤原因 : ", $e->getMessage(), "<br>";
        //echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>
