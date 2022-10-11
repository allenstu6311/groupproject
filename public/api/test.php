<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

    // require_once("../../src/connect_cgd102g2.php");
    require_once("../connect_cgd102g2.php");//上線路徑

$sql = "SELECT * FROM SHOPPINGCART";

$book = $pdo->query($sql);
$books = $book->fetchAll();
$data = [];

foreach ($books as $i => $page) {

    $data[] = $page;
}
print_r($page);


?>