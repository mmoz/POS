<?php
require('connect.php');

$userID = $_POST['userID'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$addr = $_POST['addr'];
$Tel = $_POST['Tel'];
$pos = $_POST['pos'];



    mysqli_query($conn, "INSERT INTO users(userID,password,firstname,lastname,addr,Tel,pos) VALUES ('$userID','$password','$firstname','$lastname','$addr','$Tel','$pos')");


    if($conn){
    echo  "บันทึกข้อมูลเรียบร้อย<script>window.location='indexadmin.php'</script>";
    }else{
        echo "เกิดข้อผิดพลาด";
    }


?>