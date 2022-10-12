<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

  // require_once("../../src/connect_cgd102g2.php"); //開發路徑
    require_once("../connect_cgd102g2.php"); //上線用

    $sql = "SELECT * FROM FAQ WHERE FAQ_ID = :FAQ_ID";
    $faqAccount = $pdo -> prepare($sql);
    $faqAccount->bindValue(":FAQ_ID",$_POST["FAQ_ID"]);
    $faqAccount->execute();
    

    if( $faqAccount->rowCount() == 0 ){ //找不到ID
        //傳回未修改成功
        echo "修改失敗";
        
    }else{ //找到ID
        //存入資料庫
        $updateSql = "UPDATE FAQ SET
        FAQ_ID = :FAQ_ID,
        FAQ_TITLE = :FAQ_TITLE,
        FAQ_TEXT = :FAQ_TEXT,
        WHERE FAQ_ID = :FAQ_ID";

        $faq = $pdo -> prepare($updateSql);
        $faq->bindValue(":FAQ_ID",$_POST["FAQ_ID"]);
        $faq->bindValue(":FAQ_TITLE",$_POST["FAQ_TITLE"]);
        $faq->bindValue(":FAQ_TEXT",$_POST["FAQ_TEXT"]);
        $faq->execute();

        echo "修改成功";
    }	

	}
    catch(PDOException $e){
    echo $e->getMessage();
    }

?>