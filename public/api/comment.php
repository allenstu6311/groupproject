<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");


function send($post,$product_id,$mem_id){

  require_once("../../src/connect_cgd102g2.php"); //開發路徑
// require_once("../connect_cgd102g2.php");//上線路徑

$sql = "insert into comment values(NULL,'{$post}',now(),{$product_id},{$mem_id})";

$comment = $pdo->query($sql);

}
send($_GET['post'],$_GET['product_id'],$_GET['mem_id'],)

?>
