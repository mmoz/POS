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
 
 $sql = " SELECT reportID,productname,date,qty,stat
 FROM report
  WHERE stat LIKE 'ขาย%' ORDER BY reportID DESC LIMIT {$start} , {$perpage}";

    $result=mysqli_query($conn,$sql);

 ?>
 <?php include 'indexform.php';?>
 
 <form class="form-form-outline" action="searchreport.php" class="form-group" method="POST">
    <input class="form-control mr-sm-2" type="search" name ="productname" placeholder="กรอกชื่อสินค้า" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ค้นหา</button> <a href = "delrep.php?iddel=remove" class="btn btn-danger"onClick = "return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบประวัติ</button></a>
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
 <?php while ($row = mysqli_fetch_assoc($result)) { ?>
 <tr>
 <td><?php echo $row["reportID"]; ?></td>
 <td><?php echo $row["productname"]; ?></td>
 <td><?php echo $row["date"]; ?></td>
 <td><?php echo $row["qty"]; ?></td>
 <td><?php echo $row["stat"]; ?></td>
 <td><a href ="deleterep.php?iddel=<?php echo$row['reportID']?>" class="btn btn-danger"onClick = "return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบ</a>


 </tr>
 <?php } ?>
 </tbody>

 </table>
 <?php
 $sql2 = "SELECT reportID,productname,date,qty,stat
 FROM report
  WHERE stat LIKE 'ขาย%'    ORDER BY reportID DESC";
 $query2 = mysqli_query($conn, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
 
 <nav>
<ul class="pagination justify-content-center">
 <li>
 <a href="reportpage.php?page=1" class = "btn btn-outline-success"aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li><a href="reportpage.php?page=<?php echo $i; ?>" class = "btn btn-outline-success"><?php echo $i; ?></a></li>
 <?php } ?>
 <li>
 <a href="reportpage.php?page=<?php echo $total_page;?>" class = "btn btn-outline-success" aria-label="Next">
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