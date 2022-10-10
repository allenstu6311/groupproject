<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function commodity($judge,$mem_id,$prod_id,$prod_qty){

    try{
           // require_once("../../src/connect_cgd102g2.php"); //開發路徑
    require_once("../connect_cgd102g2.php");//上線路徑

    switch($judge){
        case 1:
        $sql="INSERT INTO SHOPPINGCART VALUES(NULL,{$mem_id},{$prod_id},{$prod_qty},1)";
        break;
        case 2:
        $sql="DELETE FROM SHOPPINGCART WHERE PROD_ID={$prod_id}";
        break;
        case 3:
        $sql="UPDATE SHOPPINGCART SET PROD_QTY = PROD_QTY+1 WHERE PROD_ID={$prod_id}";
        break;  
        case 4:
        $sql="UPDATE SHOPPINGCART SET PROD_QTY = PROD_QTY-1 WHERE PROD_ID={$prod_id}";
        break;  
    }
  $test = $pdo->query($sql);
    if($test->rowCount()>0){
        echo 'ok';
    }else{
        echo 'no';
    }

    }catch(PDOException $e){
    echo $e->getMessage();
  }
 

}


commodity($_GET['judge'],$_GET['mem_id'],$_GET['prod_id'],$_GET['prod_qty'])

?>