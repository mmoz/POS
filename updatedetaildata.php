<?php
require("connect.php");
$id=$_POST["productID"];

$detail=$_POST["detail"];





$sql = "UPDATE product SET productdetail='$detail' WHERE productID='$id'";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn) . "<br>$sql");

if($result){
    echo  "<script>window.location='index.php'</script>";
    }else{
        echo mysqli_error();

    }



?>
