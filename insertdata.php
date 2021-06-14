<?php
require('connect.php');

$productname = $_POST['productname'];
$productcategory = $_POST['productcategory'];
$remainunit = $_POST['remainunit'];
$price = $_POST['price'];


    mysqli_query($conn, "INSERT INTO product(productname,productcategory,remainunit,price) VALUES ('$productname','$productcategory','$remainunit','$price')");


    if($conn){
    echo  "บันทึกข้อมูลเรียบร้อย <script>window.location='index.php'</script>";
    }else{
        echo "เกิดข้อผิดพลาด";
    }


?>