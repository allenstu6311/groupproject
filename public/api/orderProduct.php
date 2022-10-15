<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function getProductId($prod_id){

    //require_once("../../src/connect_cgd102g2.php"); //開發路徑
    require_once("../connect_cgd102g2.php");//上線路徑

    $sql = "SELECT * FROM PRODUCT WHERE PROD_ID={$prod_id}";
    $product = $pdo->query($sql);
    $products = $product->fetchAll(PDO::FETCH_ASSOC);

    $data=[];

    foreach($products as $i=> $thing){
        $data[]=$thing;
    }
    
    echo json_encode($data);
}
getProductId($_GET['prod_id'])


?>