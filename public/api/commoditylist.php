<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function pagination($judge,$range_1, $range_2)
{
    // require_once("../connect_cgd102g2.php");
    require_once("../connect_cgd102g2.php");//上線路徑

    switch($judge){
        case 0:
        $sql = "SELECT * FROM PRODUCT WHERE PROD_STATUS=1  LIMIT {$range_1},{$range_2} ";
        break;
        case 1:
        $sql = "SELECT * FROM PRODUCT WHERE PROD_STATUS=1 ORDER BY PROD_PRICE DESC LIMIT {$range_1},{$range_2} ";
        break;
        case 2:
        $sql = "SELECT * FROM PRODUCT WHERE PROD_STATUS=1 ORDER BY PROD_PRICE LIMIT {$range_1},{$range_2} ";
        break;
        case 3:
        $sql = "SELECT * FROM PRODUCT WHERE PROD_STATUS=1 ORDER BY PROD_REVIEW/PROD_TIMES DESC LIMIT {$range_1},{$range_2} ";
        break;
        case 4:
        $sql = "SELECT * FROM PRODUCT WHERE PROD_STATUS=1 ORDER BY PROD_REVIEW/PROD_TIMES LIMIT {$range_1},{$range_2} ";
        break;
        case 5:
        $sql = "SELECT * FROM PRODUCT WHERE PROD_STATUS=1 ORDER BY PROD_DATE DESC LIMIT {$range_1},{$range_2} ";
        break;
        case 6:
        $sql = "SELECT * FROM PRODUCT WHERE PROD_STATUS=1 ORDER BY PROD_DATE LIMIT {$range_1},{$range_2} ";
        break;

    }
    $book = $pdo->query($sql);
    $books = $book->fetchAll();
    $data = [];

    foreach ($books as $i => $page) {

        $data[] = $page;
    }
    echo json_encode($data);
}
pagination($_GET['judge'],$_GET['range_1'], $_GET['range_2']);

