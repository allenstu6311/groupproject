<?php
header('Access-Control-Allow-Origin:*');
// header("Content-Type:application/json;charset=utf-8");
echo "123";
$image_file = $_FILES["PROD_PIC1"];
echo $image_file['name'];


// function fileInfo($PROD_NAME,$PROD_PRICE,$PROD_PIC1,$PROD_PIC2,$PROD_PIC3,
// $PROD_STATUS,$PROD_DATE,$PROD_DESC1,$PROD_DESC2,$PROD_DESC3,$PROD_TYPE){

     // require_once("../connect_cgd102g2.php"); //開發路徑
     require_once("../connect_cgd102g2.php");//上線路徑
    
        // if(file_exists("./pic")===false){
        //     mkdir("pic");//製造資料夾
        // }

        if($_FILES['PROD_PIC1']['error']==UPLOAD_ERR_OK){//確認是否上傳成功

            if(file_exists("./pic")===false){
                mkdir("pic");//製造資料夾
            }
        };
        if($_FILES['PROD_PIC2']['error']==UPLOAD_ERR_OK){//確認是否上傳成功

            if(file_exists("./pic")===false){
                mkdir("pic");//製造資料夾
            }
        };
        if($_FILES['PROD_PIC3']['error']==UPLOAD_ERR_OK){//確認是否上傳成功

            if(file_exists("./pic")===false){
                mkdir("pic");//製造資料夾
            }
        };
        //-------------image 0
        //複製檔案路徑  uniqid()產生id
        $filePath1 = pathinfo($_FILES["PROD_PIC1"]["name"]);
        $fileName1 = uniqid().".{$filePath1["extension"]}";//?
    
        $from = $_FILES["PROD_PIC1"]["tmp_name"];//?
        $to = "pic/{$fileName1}";
        copy($from,$to);


        $filePath2 = pathinfo($_FILES["PROD_PIC2"]["name"]);
        $fileName2 = uniqid().".{$filePath2["extension"]}";//?
    
        $from = $_FILES["PROD_PIC2"]["tmp_name"];//?
        $to = "pic/{$fileName2}";
        copy($from,$to);
    
        $filePath3 = pathinfo($_FILES["PROD_PIC3"]["name"]);
        $fileName3 = uniqid().".{$filePath3["extension"]}";//?
    
        $from = $_FILES["PROD_PIC3"]["tmp_name"];//?
        $to = "pic/{$fileName3}";
        copy($from,$to);



    $sql = "INSERT INTO PRODUCT (PROD_ID,PROD_NAME,PROD_PRICE,PROD_PIC1,PROD_PIC2,
    PROD_PIC3,PROD_STATUS,PROD_DATE,SLIDE,PROD_DESC1,PROD_DESC2,PROD_DESC3,PROD_REVIEW,
    PROD_TIMES,PROD_TYPE)values(null, :PROD_NAME, :PROD_PRICE,:fileName1, :fileName2, :fileName3,
    :PROD_STATUS,:PROD_DATE,0,:PROD_DESC1,:PROD_DESC2,:PROD_DESC3,0,0,:PROD_TYPE)";

// $sql = "INSERT INTO PRODUCT (PROD_ID,PROD_NAME,PROD_PRICE,PROD_PIC1,PROD_PIC2,
// PROD_PIC3,PROD_STATUS,PROD_DATE,SLIDE,PROD_DESC1,PROD_DESC2,PROD_DESC3,PROD_REVIEW,
// PROD_TIMES,PROD_TYPE) values(null, {$fileName1}, {$_POST['PROD_PRICE']},:fileName1, :fileName2, :fileName3,
// :PROD_STATUS,:PROD_DATE,0,:PROD_DESC1,:PROD_DESC2,:PROD_DESC3,0,0,:PROD_TYPE)";
// echo $sql;

        
    $products = $pdo->prepare($sql);
    $products -> bindValue(":PROD_NAME", $_POST["PROD_NAME"]);//?
    $products -> bindValue(":PROD_PRICE", $_POST["PROD_PRICE"]);
    $products -> bindValue(":fileName1", $fileName1);
    $products -> bindValue(":fileName2", $fileName2);
    $products -> bindValue(":fileName3", $fileName3);
    $products -> bindValue(":PROD_STATUS", $_POST["PROD_STATUS"]);
    $products -> bindValue(":PROD_DATE", $_POST["PROD_DATE"]);
    $products -> bindValue(":PROD_DESC1", $_POST["PROD_DESC1"]);
    $products -> bindValue(":PROD_DESC2", $_POST["PROD_DESC2"]);
    $products -> bindValue(":PROD_DESC3", $_POST["PROD_DESC3"]);
    $products -> bindValue(":PROD_TYPE", $_POST["PROD_TYPE"]);
    $products -> execute();
    echo "商品編號:", $pdo->lastInsertId();
 
// }


//  fileInfo($_POST['PROD_NAME'],$_POST['PROD_PRICE'],$_POST['PROD_PIC1'],$_POST['PROD_PIC2'],$_POST['PROD_PIC3']
//  ,$_POST['PROD_STATUS'],$_POST['PROD_DATE'],$_POST['PROD_DESC1'],$_POST['PROD_DESC2'],$_POST['PROD_DESC3'],
//  $_POST['PROD_TYPE'])
?>