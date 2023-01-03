
<?php
require('connect.php');
$id = $_GET["iddelb"];

$sql = "DELETE FROM bill WHERE bill_ID = $id";

$result = mysqli_query($conn,$sql);

if($result){
    echo  "บันทึกข้อมูลเรียบร้อย <script>window.location='bill.php'</script>";
}else{
    echo "เกิดข้อผิดพลาด";

}
