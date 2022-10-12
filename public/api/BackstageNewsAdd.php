<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    require_once("../connect_cgd102g2.php"); //上線用
    // require_once("../../connect_cgd102g2.php"); //開發路徑

    $sql = "SELECT * FROM NEWS WHERE NEWS_ID = :NEWS_ID";
    $newsAccount = $pdo -> prepare($sql);
    $newsAccount->bindValue(":NEWS_ID",$_POST["NEWS_ID"]);
    $newsAccount->execute();
    if( $newsAccount->rowCount() == 0 ){ //找不到

      //存入資料庫
        $insertSql = "INSERT INTO NEWS (NEWS_ID,NEWS_DATE,NEWS_TITLE,NEWS_TEXT,NEWS_PIC)
                VALUES(:NEWS_ID,:NEWS_DATE,:NEWS_TITLE,:NEWS_TEXT,:NEWS_PIC)";
        $news = $pdo -> prepare($insertSql);
        $news->bindValue(":NEWS_ID",$_POST["NEWS_ID"]);
        $news->bindValue(":NEWS_DATE",$_POST["NEWS_DATE"]);
        $news->bindValue(":NEWS_TITLE",$_POST["NEWS_TITLE"]);
        $news->bindValue(":NEWS_TEXT",$_POST["NEWS_TEXT"]);
        $news->bindValue(":NEWS_PIC",$_POST["NEWS_PIC"]);
        $news->execute();
        echo "新增成功";
    }else{ //找得到
      //傳回已存在
        echo "新增失敗";
    }	
    
  }catch(PDOException $e){
    echo $e->getMessage();
  }

?>