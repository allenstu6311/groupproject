<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");


function pagination($range_1,$range_2){
    // require_once("../../src/connect_cgd102g2.php"); //開發路徑
    require_once("../connect_cgd102g2.php");//上線路徑

    $sql="SELECT POD.PROD_ORDERS_ID,POD.PROD_ORDERS_DATE,M.MEM_NAME,POD.PROD_ORDERS_STATUS
    FROM PRODUCT_ORDERS POD JOIN MEMBER M 
    ON POD.MEM_ID=M.MEM_ID
    ORDER BY POD.PROD_ORDERS_DATE
    LIMIT {$range_1},{$range_2};";
    
    $info = $pdo->query($sql);
    
    $infos = $info->fetchAll();
    
    $data=[];
    
    foreach($infos as $i=>$thing){
        $data[]=$thing;
    }   
    
    echo json_encode($data);

}

pagination($_GET['range_1'],$_GET['range_2'])



?>