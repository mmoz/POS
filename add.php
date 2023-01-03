<?php
require("connect.php");
$id=$_GET["idadd"];
$productID=["productID"];
$productname=["productname"];
$productcategory=["productcategory"];
$date=["txtdate"];
$add = $_POST ["add"];
$stat=$_POST["stat"];


$sql ="UPDATE product SET remainunit = remainunit +'$add' WHERE productID='$id'";
$result=mysqli_query($conn,$sql) or die (mysql_error());;

$sql2 = "INSERT INTO report(productID,productname,productcategory,date,qty,stat)VALUES('".$_POST["productID"]."','".$_POST["productname"]."','".$_POST["productcategory"]."','".$_POST["txtdate"]."','".$_POST["add"]."','".$_POST["stat"]."')";
$result1 = mysqli_query($conn,$sql2);
if($result){
    echo "<script>window.location='index.php'</script>";
} else {
    echo "Error updating record: " . $conn->error;

}   

?>