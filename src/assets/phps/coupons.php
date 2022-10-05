<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    require_once("../../connect_cgd102g2.php");

    $sql = "select * from coupons";
    $coupon = $pdo->query($sql);

    if($coupon->rowCount()==0){
        echo "無折價券資料";
        // exit();
    }else{
        $coupons = $coupon->fetchAll(PDO::FETCH_ASSOC);
        $data = [];

        foreach($coupons as $i => $page){
        
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
