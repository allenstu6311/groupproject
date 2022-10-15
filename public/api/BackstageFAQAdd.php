<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    require_once("../connect_cgd102g2.php"); //上線用
    // require_once("../../connect_cgd102g2.php"); //開發路徑

    $sql = "SELECT * FROM FAQ WHERE FAQ_ID = :ID";
    $faqAccount = $pdo -> prepare($sql);
    $faqAccount->bindValue(":ID",$_POST["id"]);
    $faqAccount->execute();

    if( $faqAccount->rowCount() == 0 ){ //找不到


      //存入資料庫
        $insertSql = "INSERT INTO FAQ (FAQ_ID,FAQ_TITLE,FAQ_TEXT)
                VALUES(:ID,:FAQ_TITLE,:FAQ_TEXT)";
        $news = $pdo -> prepare($insertSql);
        $news->bindValue(":ID",$_POST["id"]);
        $news->bindValue(":FAQ_TITLE",$_POST["title"]);
        $news->bindValue(":FAQ_TEXT",$_POST["text"]);
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