<?php

header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function rack($num,$id){

   // require_once("../connect_cgd102g2.php"); //開發路徑
     require_once("../connect_cgd102g2.php");//上線路徑
    switch($num){
        case 0:
        $sql = "update product set PROD_STATUS=0 WHERE PROD_ID={$id}";
        break;
        case 1:
        $sql = "update product set PROD_STATUS=1 WHERE PROD_ID={$id}";
        break;
    };
    $product = $pdo->query($sql);
    if($product->rowCount()>0){
        echo "1";
    }else{
        echo"no";
    }

}
rack($_GET['num'],$_GET['id'])


?>