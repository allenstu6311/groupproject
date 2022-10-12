<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    require_once("../connect_cgd102g2.php"); //上線用
    // require_once("../../connect_cgd102g2.php"); //開發路徑

    $sql = "SELECT * FROM FAQ WHERE FAQ_ID = :FAQ_ID";
    $faqAccount = $pdo -> prepare($sql);
    $faqAccount->bindValue(":FAQ_ID",$_POST["FAQ_ID"]);
    $faqAccount->execute();
    if( $faqAccount->rowCount() == 0 ){ //找不到

      //存入資料庫
        $insertSql = "INSERT INTO FAQ (FAQ_ID,FAQ_TITLE,FAQ_TEXT)
                VALUES(:FAQ_ID,:FAQ_TITLE,:FAQ_TEXT)";
        $news = $pdo -> prepare($insertSql);
        $news->bindValue(":FAQ_ID",$_POST["FAQ_ID"]);
        $news->bindValue(":FAQ_TITLE",$_POST["FAQ_TITLE"]);
        $news->bindValue(":FAQ_TEXT",$_POST["FAQ_TEXT"]);
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