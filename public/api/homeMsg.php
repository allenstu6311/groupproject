<?php
//php的跨域問題,從前端傳到後端php,後端php上面要加這兩行
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

 // require_once("../../src/connect_cgd102g2.php"); //開發用
require_once("../connect_cgd102g2.php");//上線用

$sql = "select * from MSG";//取資料庫的 PRODUCT MSG

$msg = $pdo->query($sql); //設定變數把sql的東西放進去

$msgs = $msg->fetchAll();//建立變數存取物件們  ->執行的意思

$data=[]; //建立陣列要印出資料的陣列

foreach($msgs as $i=>$items){ //建立迴圈把msg的資料一筆一筆地放到陣列
    $data[]=$items;
}

echo json_encode($data); //用json檔印出陣列的資料

?>