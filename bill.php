<?php include 'bootstrap.php' ?>


    <head>
     
    </head>
<?php

require('connect.php'); 

$perpage = 10;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;

$sql = "SELECT * FROM bill ORDER BY bill_ID DESC LIMIT {$start} , {$perpage}"
;

$result=mysqli_query($conn,$sql);


?>


<html>
<head>

<title></title>

</head>
<body style="background-color:#E1E5EA;"->
<?php include 'indexform.php';?>

<table class="table  table-primary" >
  <tr>
    <thead>
    <th scope="col">เลขที่ใบเสร็จ</th>
    <th scope="col">วันที่</th>
    <th scope="col"></th>
    <th scope="col"></th>




</tr>
</thead>
<tbody>

<?php
while ($row = mysqli_fetch_assoc($result)) {
?>

<td align=""><?php echo $row["bill_ID"]; ?></td>
<td align=""><?php echo $row["date"]; ?></td>
<td><a href = "receipt.php?id=<?php echo $row["bill_ID"];?>">
<button type="button" class="btn btn-outline-info" >ออกใบเสร็จ</button></a></td>

<td><a href ="deletebill.php?iddelb=<?php echo$row['bill_ID']?>" class="btn btn-danger" onClick = "return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบ</a>






</td>


  </tr>
 

  <?php } ?>
  
  <a href = "delbill.php?iddel=remove" class="btn btn-danger"onClick = "return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบประวัติ</button></a>
  
  </table>
 


 <?php
 $sql2 = "SELECT * FROM bill ORDER BY bill_ID DESC "
 ;
 $query2 = mysqli_query($conn, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
 
 <nav>
<ul class="pagination justify-content-center">
 <li>
 <a href="bill.php?page=1" class = "btn btn-outline-success"aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li><a href="bill.php?page=<?php echo $i; ?>" class = "btn btn-outline-success"><?php echo $i; ?></a></li>
 <?php } ?>
 <li>
 <a href="bill.php?page=<?php echo $total_page;?>" class = "btn btn-outline-success" aria-label="Next">
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
</html>


</body>


</html>