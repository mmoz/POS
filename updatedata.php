<?php
require("connect.php");
$productID=$_POST["productID"];

$productname=$_POST["productname"];
$productcategory=$_POST["productcategory"];
$remainunit=$_POST["remainunit"];
$price=$_POST["price"];
$pic=$_FILES['pic']['name'];





if($pic != NULL){
    move_uploaded_file($_FILES["pic"]["tmp_name"],"uploads/".$_FILES["pic"]["name"]);
mysqli_query($conn, $sql ="UPDATE product SET productname ='$productname',pic ='$pic',productcategory = '$productcategory',remainunit = '$remainunit',price='$price' WHERE productID=$productID");
}else {
    move_uploaded_file($_FILES["pic"]["tmp_name"],"uploads/".$_FILES["pic"]["name"]);
mysqli_query($conn, $sql ="UPDATE product SET productname ='$productname',productcategory = '$productcategory',remainunit = '$remainunit',price='$price' WHERE productID=$productID");
  
}

if($conn){
    echo  "บันทึกข้อมูลเรียบร้อย <script>window.location='index.php'</script>";
    }else{
        echo "เกิดข้อผิดพลาด";
    }


?>
