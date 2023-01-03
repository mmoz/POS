<?php
require('connect.php');
$id = $_GET["idpro"];

$sql = "DELETE FROM product WHERE productID = $id";

$result = mysqli_query($conn,$sql);

if($result){
    echo  "บันทึกข้อมูลเรียบร้อย <script>window.location='index.php'</script>";
}else{
    echo "เกิดข้อผิดพลาด";

}

?>