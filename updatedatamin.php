<?php
require("connect.php");
$id=$_POST['userID'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$password=$_POST['password'];
$addr=$_POST['addr'];
$Tel=$_POST['Tel'];
$pos=$_POST['pos'];


$sql = "UPDATE users SET firstname='$firstname',lastname='$lastname',password = '$password',addr='$addr',Tel='$Tel',pos='$pos' WHERE userID='$id'";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn) . "<br>$sql");

if($result){
    echo  "บันทึกข้อมูลเรียบร้อย <script>window.location='indexadmin.php'</script>";
    }else{
        echo mysqli_error();

    }


?>
