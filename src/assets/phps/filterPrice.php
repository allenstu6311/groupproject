<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");


function price($filterPrice_1,$filterPrice_2){

require_once("../../connect_cgd102g2.php");


$sql = "select * from PRODUCT where PROD_STATUS=1 and PROD_PRICE BETWEEN {$filterPrice_1} AND {$filterPrice_2} ";

$book = $pdo->query($sql);

$books = $book->fetchAll();

$data=[];

    foreach($books as $i=> $page){
        $data[]=$page;
    }


    echo json_encode($data);
  
}
price($_GET['filterPrice_1'],$_GET['filterPrice_2'])

?>
