<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function myCoupon($mem_id,$coupon_id){
    try{
        //require_once("../../src/connect_cgd102g2.php"); //開發路徑
        require_once("../connect_cgd102g2.php");//上線路徑

        $sql = "SELECT C.CPS_ID,C.CPS_NAME,M.MY_COUPONS_STATUS
                FROM MY_COUPONS M JOIN COUPONS C
                ON M.CPS_ID = C.CPS_ID
                where M.MEM_ID={$mem_id} AND M.CPS_ID={$coupon_id}";
        
        $myCoupon = $pdo->query($sql);
        // $myCoupon ->execute();

        if($myCoupon->rowCount()==0){//存入
            echo "存入折價券";
            // exit();
        }else{
            $coupon_data = $myCoupon->fetchAll(PDO::FETCH_ASSOC);
            $data = [];

            foreach($coupon_data as $i => $page){
            
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
}
myCoupon($_GET['mem_id'],$_GET['coupon_id'],)
?>
