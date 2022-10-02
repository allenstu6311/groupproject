<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");


function review($number,$product){

require_once("./url.php");


$sql = "update PRODUCT set PROD_REVIEW = PROD_REVIEW+{$number} ,PROD_TIMES = PROD_TIMES+1 WHERE PROD_NAME='{$product}'";

$book = $pdo->query($sql);

if($book->rowCount()==0){
    echo "{}";
}else{
    $books = $book->fetchAll();

$data=[];

    foreach($books as $i=> $page){
        $data[]=$page;
    }
    echo json_encode($data);
}
}
review($_GET['number'],$_GET['product'])

?>