<?php
require("connect.php");
$id=$_GET["idpost"];
$post=$_POST['txtpost'];


$sql = "UPDATE orders SET postID='$post' WHERE order_ID='$id'";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn) . "<br>$sql");

if($result){
    echo  "บันทึกข้อมูลเรียบร้อย <script>window.location='checkorder.php'</script>";
    }else{
        echo mysqli_error($conn);

    }


?>
