<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");


function search($target){

  // require_once("../../src/connect_cgd102g2.php"); //開發路徑
  require_once("../connect_cgd102g2.php");//上線路徑


$sql = "select * from PRODUCT where PROD_STATUS=1 and PROD_NAME like '%{$target}%' ";

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
search($_GET['target'])

?>