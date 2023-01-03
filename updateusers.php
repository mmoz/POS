<?php
require("connect.php");
$id=$_POST['txtcusID'];
$firstname=$_POST['txtname'];
$lastname=$_POST['txtsurname'];
$addr=$_POST['txtaddress'];
$Tel=$_POST['txttel'];
$post=$_POST['txtpost'];



$sql = "UPDATE usersreg SET firstname='$firstname',lastname='$lastname',address='$addr',tel='$Tel',post='$post' WHERE usersreg_ID='$id'";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn) . "<br>$sql");

if($result){
    echo  "บันทึกข้อมูลเรียบร้อย <script>window.location='usersdatadetail.php'</script>";
    }else{
        echo mysqli_error();

    }


?>