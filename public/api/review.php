<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");


function review($number,$product){

//   require_once("../connect_cgd102g2.php"); //開發路徑
require_once("../connect_cgd102g2.php");//上線路徑


$sql = "UPDATE PRODUCT SET PROD_REVIEW = PROD_REVIEW+{$number} ,PROD_TIMES = PROD_TIMES+1 WHERE PROD_NAME='{$product}'";

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