<?php require("connect.php");   ?> 
<?php require("bootstrap.php");   ?> 
<?php session_start();   ?> 





<?php include 'indexform.php';?>




<?php  

$perpage = 5;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;

$data = "SELECT *  FROM orders WHERE order_ID ORDER BY order_ID DESC LIMIT {$start} , {$perpage}";
$dataQuery = mysqli_query($conn, $data);
?>

<table border="1" class="table">
<th class="text-center">เลขที่ใบสั่งซื้อ</th>
<th class="text-center">วันที่</th>
<th class="text-center">ชื่อ</th>
<th class="text-center">นามสกุล</th>
<th class="text-center">เบอร์โทร</th>
<th class="text-center"></th>

<th class="text-center"></th>
<th class="">สถานะ</th>
<th class="text-center"></th>
<th class="text-center"></th>
<th class="text-center"></th>
<th class="">กรอกเลขพัสดุ</th>







<?php
while($dataResult = mysqli_fetch_array($dataQuery))
{

?>
<tr>
<td align="center"><?php echo $dataResult["order_ID"]; ?></td>
<td align="center" style="display:none;"><?php echo $dataResult["usersreg_ID"]; ?></td>
<td align="center"><?php echo $dataResult["orderDate"]; ?></td>
<td align="center"><?php echo $dataResult["firstname"]; ?></td>
<td align="center"><?php echo $dataResult["lastname"]; ?></td>
<td align="center"><?php echo $dataResult["tel"]; ?></td>

<?php if($dataResult["slip"] != NULL){ ?> 
<td><a target="_blank" href="../project/slips/<?php echo $dataResult["slip"]; ?>"><img src="../project/slips/<?php echo $dataResult["slip"]; ?>" width="150px" height="100px"></a>
<?php
}else{?>

<td align="center"></td>


<?php
}
?>


<td>
<?php
if($dataResult['postatus'] == "ยืนยันแล้ว"){

echo "<td><span style='color:green'>ยืนยันแล้ว</span></td>";

}else if($dataResult['postatus'] == "รอการตรวจสอบ"){

echo "<td><span style='color:green'>ชำระเงินแล้ว</span></td>";

}else if($dataResult['postatus'] == "กำลังจัดเตรียมสินค้า"){

    echo "<td><span style='color:green'>กำลังจัดเตรียมสินค้า</span></td>";
}else if($dataResult['postatus'] == "จัดส่งสินค้าเรียบร้อยแล้ว"){

    echo "<td><span style='color:green'>จัดส่งสินค้าแล้ว</span></td>";
    
}else if($dataResult['postatus'] == "ยังไม่ชำระเงิน"){

    echo "<td><span style='color:red'>ยังไม่ชำระเงิน</span></td>";
  }else if($dataResult['postatus'] == "ยกเลิกคำสั่งซื้อ"){

    echo "<td><span style='color:red'>ยกเลิกคำสั่งซื้อ</span></td>";
  }
?>
</td>


<td>


<?php
if($dataResult['postatus'] == "รอการตรวจสอบ"){?>

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

</a>

</td>

<td>

<?php if($dataResult['postatus'] == "รอการตรวจสอบ"){?>

<a href = "posell.php?id=<?php echo $dataResult["order_ID"];?>">
    <input type="button" class="btn btn-outline-danger" value="ยืนยันการสั่งซื้อ">
</a>

<?php }else if($dataResult['postatus'] == "ยืนยันแล้ว"){ ?>
    
<form name="form" method="post" action="updateems.php?Action=Save">
<input type="hidden" name="txtID" value="<?php echo  $dataResult["order_ID"];?>">
<input class="btn btn-outline-success" type="submit" name="submit" value="กำลังจัดเตรียมสินค้า">
<input type="hidden" name="hdnNo" value="<?php echo $i;?>">
</form>    
    

    <?php }elseif($dataResult['postatus'] == "กำลังจัดเตรียมสินค้า"){?>

        <form name="form" method="post" action="updateems1.php?Action=Save">
<input type="hidden" name="txtID" value="<?php echo  $dataResult["order_ID"];?>">
<input class="btn btn-outline-success" type="submit" name="submit" value="จัดส่งพัสดุเรียบร้อยแล้ว">
<input type="hidden" name="hdnNo" value="<?php echo $i;?>">
</form>  
<?php }elseif($dataResult['postatus'] == "จัดส่งสินค้าเรียบร้อยแล้ว"){?>

<form action="addpost.php?idpost=<?php echo$dataResult['order_ID']?>" method="POST" >
<td><input type="text" name="txtpost" value=""> 
    <button type="submit" class="btn btn-danger">ส่ง</button></td>
</form>


    <?php } ?>
<?php if($dataResult['postatus'] == "ยังไม่ชำระเงิน"){?>
    <a href = "cancel.php?id=<?php echo $dataResult["order_ID"];?>">
    <input type="button" class="btn btn-outline-danger" value="ยกเลิกคำสั่งซื้อ">
</a>
<?php }else{
    
} ?>

<?php
}

?>
</table>
<?php
 $sql2 = "SELECT *  FROM orders WHERE order_ID ORDER BY order_ID DESC "
 ;
 $query2 = mysqli_query($conn, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
 
 <nav>
<ul class="pagination justify-content-center">
 <li>
 <a href="checkorder.php?page=1" class = "btn btn-outline-success"aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li><a href="checkorder.php?page=<?php echo $i; ?>" class = "btn btn-outline-success"><?php echo $i; ?></a></li>
 <?php } ?>
 <li>
 <a href="checkorder.php?page=<?php echo $total_page;?>" class = "btn btn-outline-success" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
 </div>
 </div>
 </div>
 <script src="bootstrap/js/bootstrap.min.js"></script>


