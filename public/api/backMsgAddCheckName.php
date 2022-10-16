<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{

    require_once("../connect_cgd102g2.php"); //上線用

    $sql = "SELECT MSG_INTRO FROM MSG WHERE MSG_NAME = ? "; //？表示未知數 不知道送來的MSG_NAME等於什麼
    $msg = $pdo -> prepare($sql);
    //利用pdo prepare功能去編譯sql指令，會產生一個 pdo statement
    $msg->bindValue(1, $_GET["MSG_NAME"]); //綁定第一個問號
    $msg->execute();

    if( $msg->rowCount() !=0){
        echo "此按摩項目名稱已存在，不可用"; //server response = 用php echo出去
    }else{
        echo "此按摩項目名稱可使用";
    }
    	
}catch(PDOException $e){
echo $e->getMessage();
}

?>