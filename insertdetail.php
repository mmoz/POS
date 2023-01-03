<?php
    require("connect.php");

    $comment = $_POST['detail'];
    mysqli_query($conn, "INSERT INTO product (productdetail) VALUES ('$comment')");

?>



<?php
//คำสั่งกลับหน้าแรกเมื่อทำงานเสร็จ
if($conn){
    echo  "save <script>window.location='textdetail.php'</script>";
    }else{
        echo "Fail";
    }

?>
