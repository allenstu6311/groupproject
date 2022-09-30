<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("../../connect_cgd102g2.php");


$sql = "select PROD_REVIEW,PROD_TIMES from PRODUCT where PROD_STATUS=1 ";

$book = $pdo->query($sql);

$books = $book->fetchAll();

$data=[];

foreach($books as $i=> $page){

?>

<?php

    $data[]=$page;
}
echo json_encode($data);

?>