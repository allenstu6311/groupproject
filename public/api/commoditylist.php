<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function pagination($range_1, $range_2)
{
    require_once("../../src/connect_cgd102g2.php");
    // require_once("../connect_cgd102g2.php");//上線路徑
    $sql = "SELECT * FROM PRODUCT WHERE PROD_STATUS=1 ORDER BY PROD_STATUS LIMIT {$range_1},{$range_2} ";
    $book = $pdo->query($sql);
    $books = $book->fetchAll();
    $data = [];

    foreach ($books as $i => $page) {

        $data[] = $page;
    }
    echo json_encode($data);
}
pagination($_GET['range_1'], $_GET['range_2']);
// echo "====",$_GET['range_1'];
