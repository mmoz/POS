<?php
    require("connect.php");

    $id=$_GET['iddel'] == "remove"; 
    
    mysqli_query($conn,$sql = "DELETE FROM report  WHERE stat = 'ขาย'");

?>

<?php

//คำสั่งกลับหน้าแรกเมื่อทำงานเสร็จ
if($conn){
    echo  "save <script>window.location='reportpage.php'</script>";
    }else{
        echo "Fail";
    }

?>
