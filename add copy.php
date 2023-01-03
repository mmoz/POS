<?php
require("connect.php");
$id=$_GET["idadd"];
$productID=["productID"];
$add = $_POST ["add"];


$sql ="UPDATE product SET remainunit = remainunit +'$add' WHERE productID='$id'";
$result=mysqli_query($conn,$sql) or die (mysql_error());;
if($result){
    echo "Record updated successfully<script>window.location='index.php'</script>";
} else {
    echo "Error updating record: " . $conn->error;

}   

?>