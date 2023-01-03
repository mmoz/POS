<?php include 'bootstrap.php' ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <?php include 'indexform.php';?>

<?php
require('connect.php'); 
$sql = "SELECT * FROM users";
$result=mysqli_query($conn,$sql);
?>
<html>
<head>
<title></title>

</head>
<body>


    <table class="table table-bordered" >

  <tr>
    <thead>
    <nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand"></a>
  <form class="form-inline" action="searchdatamin.php" class="form-group" method="POST">
    <input class="form-control mr-sm-2" type="search" name ="firstname" placeholder="กรอกชื่อพนักงาน" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>

    <th scope="col">รหัสพนักงาน</th>
    <th scope="col">ชื่อ</th>
    <th scope="col">นามสกุล</th>
    <th scope="col">ที่อยู่</th>
    <th scope="col">เบอร์โทร</th>
    <th scope="col">แก้ไข</th>
    <th scope="col">ลบ</th>

</tr>
</thead>
<tbody>
  <?php while($row=mysqli_fetch_array($result)){?>

 
</tbody>
  <tr>
    <td><?php echo $row[2]?></td>
    <td><?php echo $row[0]?></td>
    <td><?php echo $row[1]?></td>
    <td><?php echo $row[4]?></td>
    <td><?php echo $row[5]?></td>

    <td>
      <a href= "updatemin.php?id=<?php echo$row["userID"]?>" class="btn btn-primary">แก้ไข</a>
    </td>
    <td>
    <a href ="deletemin.php?idemp=<?php echo$row['userID']?>" class="btn btn-danger"onClick = "return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบ</a>
</td>


  </tr>
  <?php } ?>

  <a href= "insertmin.php" class="btn btn-primary">เพิ่มข้อมูล</a>


 


</body>

</html>