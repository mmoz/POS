<?php
require("connect.php");
$id=$_GET["idde"];
$productID=["productID"];
$del = $_POST ["del"];


$sql ="UPDATE product SET remainunit = remainunit -'$del' WHERE productID='$id'";
$result=mysqli_query($conn,$sql) or die (mysql_error());;
if($result){
    echo "Record updated successfully<script>window.location='index.php'</script>";
} else {
    echo "Error updating record: " . $conn->error;

}   

?>