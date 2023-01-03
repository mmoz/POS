<?php
    require("connect.php");
    
    $id=$_GET['id']; 
    $substatus="ยืนยันแล้ว";

   $sql = "UPDATE orders SET postatus = '$substatus' WHERE order_ID='$id'";

   $result = mysqli_query($conn,$sql)or die(mysqli_error($conn) . "<br>$sql");
   ;

?>

<?php

//คำสั่งกลับหน้าแรกเมื่อทำงานเสร็จ
if($result){
     echo  "save <script>window.location='checkorder.php'</script>";

    
    }else{
        echo "Fail";
    }

?>