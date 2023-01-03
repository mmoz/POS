<?php
require('connect.php');
$id = $_GET["idpro"];

$sql = "DELETE FROM cart WHERE cartID = $id";

$result = mysqli_query($conn,$sql);

if($result){
    echo  "บันทึกข้อมูลเรียบร้อย <script>window.location='cartmultiins.php'</script>";
}else{
    echo "เกิดข้อผิดพลาด";

}

?>