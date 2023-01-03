<?php include 'bootstrap.php' ?>


    <head>
     
    </head>
<?php

require('connect.php'); 

$sql = "SELECT reportID,productname,date,qty,stat
FROM report
 WHERE stat LIKE 'ขาย%'	";
$result=mysqli_query($conn,$sql);

?>


<html>
<head>

<title></title>

</head>
<body style="background-color:#E1E5EA;"->
<?php include 'indexform.php';?>
<form class="form-inline" action="searchreport.php" class="form-group" method="POST">
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
  <tr>
    <td><?php echo $row["reportID"]?></td>
    <td><?php echo $row["productname"]?></td>
    <td><?php echo $row["date"]?></td>
    <td><?php echo $row['qty']?></td>
    <td><?php echo $row["stat"]?></td>
    <td><a href ="deleterep.php?iddel=<?php echo$row['reportID']?>" class="btn btn-danger"onClick = "return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบ</a>
</td>

 



</td>


  </tr>
 

  <?php } ?>
  
  <a href = "delrep.php?iddel=remove" class="btn btn-danger"onClick = "return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบประวัติ</button></a>
  </table>
 




</body>


</html>