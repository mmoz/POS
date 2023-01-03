<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<link rel='stylesheet' type='text/css' href='style.css' />

<?php
require("connect.php");
$firstname = $_POST['firstname'];

$sql = "SELECT * FROM users WHERE firstname LIKE '%$firstname%' ORDER BY firstname ASC";
$result = mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
$order=1;
?>

<html>
<head>
<title></title>

</head>
<body style="background-color:#E1E5EA;"->


<table class="table table-bordered">

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
    <a href ="deletemin.php?idemp=<?php echo$row['userID']?>" class="btn btn-danger" onClick = "return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบ</a>
</td>


  </tr>
  <?php } ?>

  <a href= "indexadmin.php" class="btn btn-primary">กลับหน้าแรก</a>

 


</body>

</html>