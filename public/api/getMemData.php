<?php
    header('Access-Control-Allow-Origin:*');
    header("Content-Type:application/json;charset=utf-8");
    try{
      require_once("../connect_cgd102g2.php");
        // require_once("../../src/connect_cgd102g2.php");//開發用
        $findMemSql = "SELECT * 
                       FROM MEMBER 
                       WHERE MEM_ID=:MEM_ID";
        $getmemData = $pdo -> prepare($findMemSql);
        $getmemData->bindValue(":MEM_ID",$_POST["id"]);
        $getmemData->execute();
        if($getmemData->rowCount() == 0 ){
            echo "錯誤";
        }else{
            $result = $getmemData->fetch(PDO::FETCH_ASSOC);

            echo json_encode($result);
        }
      }catch(PDOException $e){
        echo $e->getMessage();
      }
?>