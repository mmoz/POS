<?php require('connect.php');
?>
<?php
session_start();
$orderID=$_POST["order_ID"];
$status="รอการตรวจสอบ";

$pic=$_FILES['slip']['name'];



$strSQL = "UPDATE orders SET slip = '$pic',postatus = '$status' WHERE order_ID=$orderID";


move_uploaded_file($_FILES["slip"]["tmp_name"],"slips/".$_FILES["slip"]["name"]);
  mysqli_query($conn,$strSQL) or die(mysqli_error($conn));







  if($strSQL)
  {
      echo "<script>";
      echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
      echo "</script>";
      echo  "save <script>window.location='usersdetail.php'</script>";

  }




?>