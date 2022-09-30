<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    require_once("../../connect_cgd102g2.php");

    $sql = "select * from therapist";
    $therapist = $pdo->query($sql);

    if($therapist->rowCount()==0){
        echo "無按摩師資料";
        // exit();
    }else{
        $therapists = $therapist->fetchAll(PDO::FETCH_ASSOC);
        $data = [];

        foreach($therapists as $i => $page){
        
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
