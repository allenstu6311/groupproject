<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function getId($prod_id){

    // require_once("../../src/connect_cgd102g2.php");
    require_once("../connect_cgd102g2.php");//上線路徑


$sql = "SELECT C.*,M.MEM_NAME,M.MEM_PIC FROM COMMENT C JOIN MEMBER M
ON C.MEM_ID=M.MEM_ID WHERE C.PROD_ID={$prod_id}";

$book = $pdo->query($sql);

$books = $book->fetchAll();

$data=[];

foreach($books as $i=> $page){

    $data[]=$page;
}
echo json_encode($data);

}
getId($_GET['prod_id'])
?>

