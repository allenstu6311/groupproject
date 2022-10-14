<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function coupon($checkNum,$mem_id,$coupon_id){
    try{

        // require_once("../connect_cgd102g2.php"); //開發路徑
        require_once("../connect_cgd102g2.php");//上線路徑
        
        switch($checkNum){

            case 1:
                $sql = "INSERT INTO MY_COUPONS (`MEM_ID`, `CPS_ID`, `MY_COUPONS_STATUS`) VALUES ({$mem_id}, {$coupon_id},1)";
            break;

            case 2:
                $sql = "UPDATE MY_COUPONS 
                        SET MY_COUPONS_STATUS=1
                        WHERE CPS_ID={$coupon_id} AND MEM_ID={$mem_id}";
            break;
        }

        $pdo->query($sql);
        echo $mem_id;
    
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
coupon($_GET['checkNum'],$_GET['mem_id'],$_GET['coupon_id'])

?>
