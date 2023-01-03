
<!DOCTYPE html>
<html lang="en">
  
<head>
  <title></title>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
      
    }
  </style>
</head>
<bod>
<?php  
require('connect.php');
include 'bootstrap.php' ;
include 'banner.php' ;



session_start();

$perpage = 5;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;

$id = $_SESSION['usersreg_ID']; 
$data = "SELECT *  FROM orders WHERE usersreg_ID = $id ORDER BY order_ID DESC LIMIT {$start} , {$perpage}";
$dataQuery = mysqli_query($conn, $data);
?>

<?php

$id=$_SESSION['usersreg_ID'];
$strSQL2 = "SELECT * FROM orders WHERE usersreg_ID = $id ORDER BY order_ID DESC LIMIT {$start} , {$perpage}";
$objQuery2 = mysqli_query($conn, $strSQL2) or die(mysqli_error($conn));
$objResult2 = mysqli_fetch_array($objQuery2);


?>
<?php include 'navbar.php';?>

<center>รายละเอียดการสั่งซื้อ</center>



<table class="table">

 <th class="text-center">เลขที่ใบสั่งซื้อ </th>
 <th class="text-center">วันที่ </th>
 <th class="text-center"> ชื่อ</th>
 <th class="text-center"> เลขพัสดุ</th>
 <th></th>
 <th> </th>
 <th> </th>
 <th> </th>
 <th> </th>



<?php
while($dataResult = mysqli_fetch_array($dataQuery))
{

?>
<tr>
<td align="center"><?php echo $dataResult["order_ID"]; ?></td>
<td align="center"><?php echo $dataResult["orderDate"]; ?></td>
<td align="center"><?php echo $dataResult["firstname"]; ?></td>

<?php if($dataResult["postID"] != NULL){ ?> 
<td align="center"><?php echo $dataResult["postID"]; ?></td>
<?php }else{?>
  <td align="center"><?php echo $dataResult[""]; ?></td>

<?php }  ?>

<?php if($dataResult["slip"] != NULL){ ?> 
<td><a target="_blank" href="../project/slips/<?php echo $dataResult["slip"]; ?>"><img src="../project/slips/<?php echo $dataResult["slip"]; ?>" width="150px" height="100px"></a>
<?php
}else{?>

<td align="center"><?php echo $dataResult[""]; ?></td>


<?php
}
?>
<td>
<?php
if($dataResult['postatus'] == "ยืนยันแล้ว"){

echo "<td><span style='color:green'>ยืนยันแล้ว</span></td>";

}else if($dataResult['postatus'] == "รอการตรวจสอบ"){

echo "<td><span style='color:red'>รอการตรวจสอบ</span></td>";

}else if($dataResult['postatus'] == "กำลังจัดเตรียมสินค้า"){

    echo "<td><span style='color:green'>กำลังจัดเตรียมสินค้า</span></td>";
}else if($dataResult['postatus'] == "จัดส่งสินค้าเรียบร้อยแล้ว"){

    echo "<td><span style='color:green'>จัดส่งสินค้าแล้ว</span></td>";
}
else if($dataResult['postatus'] == "ยังไม่ชำระเงิน"){

  echo "<td><span style='color:red'>ยังไม่ชำระเงิน</span></td>";
}else if($dataResult['postatus'] == "ยกเลิกคำสั่งซื้อ"){

  echo "<td><span style='color:red'>ยกเลิกคำสั่งซื้อ</span></td>";
}
?>



</td>
<td> 
<?php
if($dataResult['postatus'] == "ยังไม่ชำระเงิน"){?>

  <td><a href = "userpodetail.php?id=<?php echo $dataResult["order_ID"];?>">
    <input type="button" class="btn btn-outline-info" value="ดูคำสั่งซื้อ"></td>

    <?php }elseif($dataResult['postatus'] == "ยกเลิกคำสั่งซื้อ"){?>

      <td><a href = "userpodetail.php?id=<?php echo $dataResult["order_ID"];?>">
    <input type="button" class="btn btn-outline-info" value="ดูคำสั่งซื้อ"></td>

<?php }else{?>

<td>
<a href = "recieptpo.php?id=<?php echo $dataResult["order_ID"];?>">
    <input type="button" class="btn btn-outline-success" value="ดูใบเสร็จ">
</a>
</td>
<?php } ?>


</td>
<?php
if($dataResult['postatus'] == "ยังไม่ชำระเงิน"){?>

<td align="center"><a href="money.php?id=<?php echo$dataResult["order_ID"]?>">ชำระเงิน</td>

<?php }else{

} ?>

<tr>




<?php
}

?>
</table>
<?php

$id = $_SESSION['usersreg_ID']; 
$sql2 = "SELECT *  FROM orders WHERE usersreg_ID = $id";
$dataQuery = mysqli_query($conn, $sql2);


$id=$_SESSION['usersreg_ID'];
$sql2 = "SELECT * FROM orders WHERE usersreg_ID = $id ";
$objQuery2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
$objResult2 = mysqli_fetch_array($objQuery2);


 $query2 = mysqli_query($conn, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
 
 <nav>
<ul class="pagination justify-content-center">
 <li>
 <a href="usersdetail.php?page=1" class = "btn btn-outline-success"aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li><a href="usersdetail.php?page=<?php echo $i; ?>" class = "btn btn-outline-success"><?php echo $i; ?></a></li>
 <?php } ?>
 <li>
 <a href="usersdetail.php?page=<?php echo $total_page;?>" class = "btn btn-outline-success" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
 </div>
 </div>
 </div>
 <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
<?php include 'footer.php';?>

</html>
