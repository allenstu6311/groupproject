<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{
    
     require_once("../../src/connect_cgd102g2.php"); //開發用
    // require_once("../connect_cgd102g2.php");//上線用

    $sql = "select * from NEWS";
    $new = $pdo->query($sql); //設定變數把sql的東西放進去

    if($new->rowCount()==0){
        echo "無資料";
        // exit();
    }else{
        $news = $new->fetchAll(PDO::FETCH_ASSOC); //如果有資料的話,就抓所有索引值的資料
        $data = [];

        foreach($news as $i => $page){
        
        ?>
        <?php
        $data[] = $page; //資料都給陣列印出來
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
