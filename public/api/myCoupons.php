<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    //require_once("../connect_cgd102g2.php"); //開發路徑
    require_once("../connect_cgd102g2.php");//上線路徑

    $sql = "SELECT * FROM MY_COUPONS";
    
    $myCoupon = $pdo->query($sql);

    if($myCoupon->rowCount()==0){
        echo "無折價券";
        // exit();
    }else{
        $myCoupons = $myCoupon->fetchAll(PDO::FETCH_ASSOC);
        $data = [];

        foreach($myCoupons as $i => $page){
        
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
