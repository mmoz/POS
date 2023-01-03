<?php include 'bootstrap.php' ?>


    <head>
     
    </head>
<?php

require('connect.php'); 

$sql = "SELECT reportID,productID,productname,date,qty,stat
FROM report
 WHERE stat LIKE 'นำเข้า%'	";

$result=mysqli_query($conn,$sql);

?>


<html>
<head>

<title></title>

</head>
<body style="background-color:#E1E5EA;"->
<?php include 'indexform.php';?>
<form class="form-inline" action="searchreportadd.php" class="form-group" method="POST">
    <input class="form-control mr-sm-2" type="search" name ="productname" placeholder="กรอกชื่อสินค้า" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ค้นหา</button>
<table class="table  table-primary" >
  <tr>
    <thead>
    <th scope="col">รหัสรายงาน</th>
    <th scope="col">ชื่อสินค้า</th>
    <th scope="col">วันที่</th>
    <th scope="col">จำนวน</th>
    <th scope="col">สถานะ</th>
    <th scope="col"></th>



</tr>
</thead>
<tbody>
  <?php 
  
  while($row=mysqli_fetch_assoc($result)){
    ?>

 
</tbody>
<form name="form" method="POST" action="deleterepadd.php?Action=Save">

  <tr>
  <td><?php echo $row["reportID"]?></td>
    <td><?php echo $row["productname"]?></td>
    <td><?php echo $row["date"]?></td>
    <td><?php echo $row['qty']?></td>
    <td><?php echo $row["stat"]?></td>
  <input type ="hidden" name="reportID" value= "<?php echo $row["reportID"]?>">
  <input type ="hidden" name="productID"value = "<?php echo $row["productID"]?>">
  <input type ="hidden" name="productname"value = "<?php echo $row["productname"]?>">
  <input type ="hidden" name="date" value= "<?php echo $row["date"]?>">
  <input type ="hidden" name="qty" value= "<?php echo $row["qty"]?>">
  <input type ="hidden" name="stat" value= "<?php echo $row["stat"]?>">
  <td><button type="submit" class="btn btn-danger" onClick = "return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')" >ลบ</button></td>

  </form>

 



</td>



</tr>


  <?php } ?>
  <a href = "delrepadd.php?iddel=remove" class="btn btn-danger"onClick = "return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบประวัติ</button></a>
  </table>

 




</body>


</html>