<?php
$errMsg = "";
try{
    require_once("../../connect_cgd102g2.php");

    if($_FILES['photo']['error']==UPLOAD_ERR_OK){//確認是否上傳成功

        if(file_exists("./pic")===false){
            mkdir("pic");//製造資料夾
        }
    }
    //-------------image 0
    //複製檔案路徑  uniqid()產生id
    $filePath[0] = pathinfo($_FILES["photo"]["name"][0]);
    $fileName[0] = uniqid().".{$filePath[0]["extension"]}";//?

    $from = $_FILES["photo"]["tmp_name"][0];//?
    $to = "pic/{$fileName[0]}";
    copy($from,$to);

    //-------------image 1
    //複製檔案路徑  uniqid()產生id
    $filePath[1] = pathinfo($_FILES["photo"]["name"][1]);
    $fileName[1] = uniqid().".{$filePath[1]["extension"]}";//?

    $from = $_FILES["photo"]["tmp_name"][1];//?
    $to = "pic/{$fileName[1]}";
    copy($from,$to);

    //-------------image 2
    //複製檔案路徑  uniqid()產生id
    $filePath[2] = pathinfo($_FILES["photo"]["name"][2]);
    $fileName[2] = uniqid().".{$filePath[2]["extension"]}";//?

    $from = $_FILES["photo"]["tmp_name"][2];//?
    $to = "pic/{$fileName[2]}";
    copy($from,$to);


    $sql = "INSERT INTO PRODUCT (PROD_ID,PROD_NAME,PROD_PRICE,PROD_PIC1,PROD_PIC2,PROD_PIC3,PROD_STATUS,PROD_DATE,slide,PROD_DESC1,PROD_DESC2,PROD_DESC3,PROD_REVIEW,PROD_TIMES)values(null, :PROD_NAME, :PROD_PRICE,:fileName0, :fileName1, :fileName2,:PROD_STATUS,:PROD_DATE,0,:PROD_DESC1,:PROD_DESC2,:PROD_DESC3,0,0)";



    $products = $pdo->prepare( $sql );
        $products -> bindValue(":PROD_NAME", $_POST["PROD_NAME"]);//?
        $products -> bindValue(":PROD_PRICE", $_POST["PROD_PRICE"]);
        $products -> bindValue(":fileName0", $fileName[0]);
        $products -> bindValue(":fileName1", $fileName[1]);
        $products -> bindValue(":fileName2", $fileName[2]);
        $products -> bindValue(":PROD_STATUS", $_POST["PROD_STATUS"]);
        $products -> bindValue(":PROD_DATE", $_POST["PROD_DATE"]);
        $products -> bindValue(":PROD_DESC1", $_POST["PROD_DESC1"]);
        $products -> bindValue(":PROD_DESC2", $_POST["PROD_DESC2"]);
        $products -> bindValue(":PROD_DESC3", $_POST["PROD_DESC3"]);
        $products -> execute();
        echo "商品編號:", $pdo->lastInsertId();

}catch(PDOException $e){
    echo $e->getMessage(), "<br>";
}
    

?>