<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

  // require_once("../../src/connect_cgd102g2.php"); //開發路徑
    require_once("../connect_cgd102g2.php"); //上線用

    $sql = "SELECT * FROM NEWS WHERE NEWS_ID = :NEWS_ID";
    $newsAccount = $pdo -> prepare($sql);
    $newsAccount->bindValue(":NEWS_ID",$_POST["NEWS_ID"]);
    $newsAccount->execute();
    

    if( $newsAccount->rowCount() == 0 ){ //找不到title
        //傳回未修改成功
        echo "修改失敗";
        
    }else{ //找到title
        //存入資料庫
        $updateSql = "UPDATE NEWS SET
        NEWS_ID = :NEWS_ID,
        NEWS_DATE = :NEWS_DATE,
        NEWS_TITLE = :NEWS_TITLE,
        NEWS_TEXT = :NEWS_TEXT,
        NEWS_PIC = :NEWS_PIC
        WHERE NEWS_ID = :NEWS_ID";

        $news = $pdo -> prepare($updateSql);
        $news->bindValue(":NEWS_ID",$_POST["NEWS_ID"]);
        $news->bindValue(":NEWS_DATE",$_POST["NEWS_DATE"]);
        $news->bindValue(":NEWS_TITLE",$_POST["NEWS_TITLE"]);
        $news->bindValue(":NEWS_TEXT",$_POST["NEWS_TEXT"]);
        $news->bindValue(":NEWS_PIC",$_POST["NEWS_PIC"]);
        $news->execute();

        echo "修改成功";
    }	

	}
    catch(PDOException $e){
    echo $e->getNews();
    }

?>