<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function shoppingCart($mem_id)
{
    // require_once("../../src/connect_cgd102g2.php");
    require_once("../connect_cgd102g2.php");//上線路徑
    $sql = "SELECT M.MEM_ID,P.PROD_ID,P.PROD_NAME,P.PROD_PRICE,P.PROD_DESC1,P.PROD_DESC2,P.PROD_DESC3,P.PROD_PIC1,S.PROD_QTY FROM 
    SHOPPINGCART S JOIN  MEMBER M 
    ON M.MEM_ID=S.MEM_ID
    JOIN  PRODUCT P 
    ON S.PROD_ID=P.PROD_ID
    WHERE S.MEM_ID ={$mem_id}";

    $book = $pdo->query($sql);
    $books = $book->fetchAll();
    $data = [];

    foreach ($books as $i => $page) {

        $data[] = $page;
    }
    echo json_encode($data);
}
shoppingCart($_GET['mem_id']);
// echo "====",$_GET['range_1'];
