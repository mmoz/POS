<?php
require('connect.php');

$productname = $_POST['productname'];
$productcategory = $_POST['productcategory'];
$remainunit = $_POST['remainunit'];
$price = $_POST['price'];
$pic=$_FILES['pic'];
$dir ="uploads/";
$fileImage = $dir . basename($_FILES["pic"]["name"]);




    mysqli_query($conn, "INSERT INTO product(productname,productcategory,remainunit,price,pic) VALUES ('$productname','$productcategory','$remainunit','$price','".$_FILES["pic"]["name"]."')");


    
  if (move_uploaded_file($_FILES["pic"]["tmp_name"],$fileImage)){

      }


    if($conn){
    echo  "บันทึกข้อมูลเรียบร้อย <script>window.location='index.php'</script>";
    }else{
        echo "เกิดข้อผิดพลาด";
    }


?>