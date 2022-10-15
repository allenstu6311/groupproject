<?php

header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8"); 

function dropCart($mem_id){
        // require_once("../../src/connect_cgd102g2.php");
        require_once("../connect_cgd102g2.php");//上線路徑

        $sql="DELETE FROM SHOPPINGCART WHERE MEM_ID={$mem_id}";

        $pdo->query($sql);
}
dropCart($_GET['mem_id'])





?>