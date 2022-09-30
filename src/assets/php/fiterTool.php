<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");


function tool($type){

require_once("../../connect_cgd102g2.php");


$sql = "select * from PRODUCT where PROD_STATUS=1 and PROD_NAME like '%{$type}%' ";

$book = $pdo->query($sql);

$books = $book->fetchAll();

$data=[];

    foreach($books as $i=> $page){
        $data[]=$page;
    }


    echo json_encode($data);
  
}
tool($_GET['type'])

?>
