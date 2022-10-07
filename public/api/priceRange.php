<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");


function price($priceRange_1,$priceRange_2){

  // require_once("../../src/connect_cgd102g2.php"); //開發路徑
  require_once("../connect_cgd102g2.php");//上線路徑


$sql = "select * from PRODUCT where PROD_STATUS=1 and PROD_PRICE BETWEEN {$priceRange_1} AND {$priceRange_2} ";

$book = $pdo->query($sql);

$books = $book->fetchAll();

$data=[];

    foreach($books as $i=> $page){
        $data[]=$page;
    }


    echo json_encode($data);
  
}
price($_GET['priceRange_1'],$_GET['priceRange_2'])

?>
