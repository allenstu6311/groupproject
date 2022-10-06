<?php
    header('Access-Control-Allow-Origin:*');
    header("Content-Type:application/json;charset=utf-8");
    try{
      require_once("../../src/connect_cgd102g2.php");
        // require_once("../connect_cgd102g2.php");//上線用
        $findMemSql = "SELECT * 
                       FROM member 
                       WHERE MEM_NAME=:MEM_NAME";
        $getmemData = $pdo -> prepare($findMemSql);
        $getmemData->bindValue(":MEM_NAME",$_POST["name"]);
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