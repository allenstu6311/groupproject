<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function backSearch($THERAPIST_NAME){
    // require_once("../connect_cgd102g2.php"); //開發路徑
    require_once("../connect_cgd102g2.php"); //上線用
    
    $sql="SELECT * FROM THERAPIST WHERE THERAPIST_NAME LIKE '%{$THERAPIST_NAME}%';";

    $product = $pdo->query($sql);

    $products = $product->fetchAll(PDO::FETCH_ASSOC);

    $data=[];

    foreach($products as $i=>$thing){
        $data[]= $thing;
    }
    echo json_encode($data);

}
backSearch($_GET['THERAPIST_NAME'])

?>