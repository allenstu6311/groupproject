<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function delete($prod_Id){

      // require_once("../connect_cgd102g2.php");
      require_once("../connect_cgd102g2.php");//上線路徑

      $sql="DELETE FROM PRODUCT WHERE PROD_ID={$prod_Id}";
      $pdo->query($sql);
}
delete($_GET['prod_id'])
    


?>