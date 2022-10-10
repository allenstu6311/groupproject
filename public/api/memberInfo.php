<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

//   require_once("../../src/connect_cgd102g2.php"); //開發路徑
require_once("../connect_cgd102g2.php");//上線路徑


$sql = "select * from MEMBER";

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




