<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function backSearch($PROD_NAME){
    require_once("../connect_cgd102g2.php"); //開發路徑
    //   require_once("../connect_cgd102g2.php");//上線路徑
    
    $sql="SELECT *FROM PRODUCT WHERE PROD_NAME LIKE  '%{$PROD_NAME}%';";

    $product = $pdo->query($sql);

    $products = $product->fetchAll();

    $data=[];

    foreach($products as $i=>$thing){
        $data[]=$thing;
    }
    echo json_encode($data);


}

backSearch($_GET['PROD_NAME'])




?>