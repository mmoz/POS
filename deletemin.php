<?php

require('connect.php');
$id = $_GET['idemp'];

$sql = "DELETE FROM users WHERE userID = '$id'";

$result = mysqli_query($conn,$sql);

if($result){
    echo  "บันทึกข้อมูลเรียบร้อย <script>window.location='indexadmin.php'</script>";
}else{
    echo "เกิดข้อผิดพลาด";

}

?>