<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");



    function newId($new_id){


    // require_once("../../src/connect_cgd102g2.php"); //開發路徑
    require_once("../connect_cgd102g2.php"); //上線用

    $sql = "DELETE FROM NEWS WHERE NEWS_ID = {$new_id}";

   $pdo->query($sql);   //執行資料庫一定要寫



	}
    newId($_GET['new_id'])

?>