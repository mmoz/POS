<?php
require('connect.php');
$id = $_GET["iddel"];

$sql = "DELETE FROM report WHERE reportID = $id";

$result = mysqli_query($conn,$sql);

if($result){
    echo  "บันทึกข้อมูลเรียบร้อย <script>window.location='reportpage.php'</script>";
}else{
    echo "เกิดข้อผิดพลาด";

}

?>