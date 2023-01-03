<html>
<head>
<?php require('connect.php'); ?>
<?php include 'bootstrap.php' ?>

<title></title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
</head>
<body>
<?php
$perpage = 10;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;
 
 $sql = " SELECT reportID,productID,productname,date,qty,stat
 FROM report
  WHERE stat LIKE 'นำเข้า%' ORDER BY reportID DESC LIMIT {$start} , {$perpage}";

    $result=mysqli_query($conn,$sql);

 ?>
 <?php include 'indexform.php';?>
 <form class="form-inline" action="searchreport.php" class="form-group" method="POST">
    <input class="form-control mr-sm-2" type="search" name ="productname" placeholder="กรอกชื่อสินค้า" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ค้นหา</button>  <a href = "delrepadd.php?iddel=remove" class="btn btn-danger"onClick = "return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบประวัติ</button></a>
</form>

 
 <body style="background-color:#E1E5EA;"->




    <table class="table  table-primary" >
  <tr>
    <thead>
    <th scope="col">รหัสรายงาน</th>
    <th scope="col">ชื่อสินค้า</th>
    <th scope="col">วันที่</th>
    <th scope="col">จำนวน</th>
    <th scope="col">สถานะ</th>
    <th scope="col"></th>


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
  </table>

 <?php
 $sql2 = "SELECT reportID,productname,date,qty,stat
 FROM report
  WHERE stat LIKE 'นำเข้า%' ORDER BY reportID DESC";
 $query2 = mysqli_query($conn, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
 
 <nav>
<ul class="pagination justify-content-center">
 <li>
 <a href="reportpageadd.php?page=1" class = "btn btn-outline-success"aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li><a href="reportpageadd.php?page=<?php echo $i; ?>" class = "btn btn-outline-success"><?php echo $i; ?></a></li>
 <?php } ?>
 <li>
 <a href="reportpageadd.php?page=<?php echo $total_page;?>" class = "btn btn-outline-success" aria-label="Next">
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