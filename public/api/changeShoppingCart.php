<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function commodity($judge,$mem_id,$prod_id,$prod_qty){
    require_once("../../src/connect_cgd102g2.php"); //開發路徑
    //require_once("../connect_cgd102g2.php");//上線路徑

    switch($judge){
        case 1:
        $sql="INSERT INTO SHOPPINGCART VALUES(NULL,{$mem_id},{$prod_id},{$prod_qty})";
        break;
        case 2:
        $sql="DELETE FROM SHOPPINGCART WHERE PROD_ID={$prod_id}";   
    }
    $pdo->query($sql);

}


commodity($_GET['judge'],$_GET['mem_id'],$_GET['prod_id'],$_GET['prod_qty'])

?>