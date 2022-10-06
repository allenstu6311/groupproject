<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function fileInfo($PROD_NAME,$PROD_PRICE,$PROD_PIC1,$PROD_PIC2,$PROD_PIC3,$PROD_STATUS,$PROD_DATE,$PROD_DESC1,$PROD_DESC2,$PROD_DESC3,$PROD_TYPE){


    
    require_once("../../connect_cgd102g2.php");
    
        if(file_exists("./pic")===false){
            mkdir("pic");//製造資料夾
        }
   
        $filePath1 = pathinfo($PROD_PIC1);
        $fileName1 = uniqid().".{$filePath1["extension"]}";

        $from = $PROD_PIC1;//?
        $to = "pic/{$fileName1}";
        copy($from,$to);

        $filePath2 = pathinfo($PROD_PIC2);
        $fileName2 = uniqid().".{$filePath2["extension"]}";

        $from = $PROD_PIC2;//?
        $to = "pic/{$fileName2}";
        copy($from,$to);

        $filePath3 = pathinfo($PROD_PIC3);
        $fileName3 = uniqid().".{$filePath3["extension"]}";

        $from = $PROD_PIC3;//?
        $to = "pic/{$fileName3}";
        copy($from,$to);

        $sql="insert into PRODUCT VALUES(18,'{$PROD_NAME}',{$PROD_PRICE},'{$fileName1}','{$fileName2}','{$fileName3}',{$PROD_STATUS},'{$PROD_DATE}',0,'{$PROD_DESC1}','{$PROD_DESC2}','{$PROD_DESC3}',0,0,'{$PROD_TYPE}')";

        $pdo->query($sql);

        echo "商品編號:", $pdo->lastInsertId();
    
  
}


fileInfo($_GET['PROD_NAME'],$_GET['PROD_PRICE'],$_GET['PROD_PIC1'],$_GET['PROD_PIC2'],$_GET['PROD_PIC3'],$_GET['PROD_STATUS'],$_GET['PROD_DATE'],$_GET['PROD_DESC1'],$_GET['PROD_DESC2'],$_GET['PROD_DESC3'],$_GET['PROD_TYPE'])
?>