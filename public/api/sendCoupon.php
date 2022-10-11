<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function coupon($mem_id,$coupon_id){
    try{

        // require_once("../connect_cgd102g2.php"); //開發路徑
        require_once("../connect_cgd102g2.php");//上線路徑
    
        $sql = "INSERT INTO MY_COUPONS VALUES
        (MEM_ID={$mem_id},CPS_ID={$coupon_id},MY_COUPONS_STATUS=1)";

         $pdo->query($sql);
    
        // if($coupon->rowCount()==0){
        //     echo "無折價券資料";
        //     // exit();
        // }
            ?>
            <?php
        
    }catch (Exception $e) {
            echo "錯誤行號 : ", $e->getLine(), "<br>";
            echo "錯誤原因 : ", $e->getMessage(), "<br>";
            //echo "系統暫時不能正常運行，請稍後再試<br>";	
    }

}
coupon($_GET['mem_id'],$_GET['coupon_id'],)

?>
