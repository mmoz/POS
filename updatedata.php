<?php
require("connect.php");
$productID=$_POST["productID"];

$productname=$_POST["productname"];
$productcategory=$_POST["productcategory"];
$remainunit=$_POST["remainunit"];
$price=$_POST["price"];

$sql ="UPDATE product SET productname ='$productname',productcategory = '$productcategory',remainunit = '$remainunit',price='$price' WHERE productID=$productID";

$result=mysqli_query($conn,$sql);

if($result){
    echo  "บันทึกข้อมูลเรียบร้อย <script>window.location='index.php'</script>";
    }else{
        echo "เกิดข้อผิดพลาด";
    }


?>
