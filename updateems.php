<?php require("connect.php");  ?>
<?php

if($_GET["Action"] == "Save")
{

    $id=$_POST["txtID"];
    $status="กำลังจัดเตรียมสินค้า";
    $sql = "UPDATE orders SET postatus='$status' WHERE order_ID='$id'";

    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn) . "<br>$sql");




}

if($result){
    echo  "save <script>window.location='checkorder.php'</script>";
    }else{
        echo "Fail";
    }






?>