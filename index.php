<?php
require('connect.php'); 
$sql = "SELECT * FROM product";
$result=mysqli_query($conn,$sql);
?>
<html>
<head>
<title></title>

</head>
<body>
<table border = 1px>
  <tr>
    <thead>
    <th>รหัสสินค้า</th>
    <th>ชื่อสินค้า</th>
    <th>ประเภทสินค้า</th>
    <th>จำนวนที่เหลือ</th>
    <th>ราคา</th>
    <th>แก้ไข</th>
    <th>ลบ</th>
</tr>
</thead>
<tbody>
  <?php while($row=mysqli_fetch_array($result)){?>

 
</tbody>
  <tr>
    <td><?php echo $row[4]?></td>
    <td><?php echo $row[0]?></td>
    <td><?php echo $row[1]?></td>
    <td><?php echo $row[2]?></td>
    <td><?php echo $row[3]?></td>
    <td>
      <a href= "update.php?id=<?php echo$row["productID"]?>" class="btn btn-primary">แก้ไข</a>
    </td>


  </tr>
  <?php } ?>

  <a href= "insert.php" class="btn btn-primary">เพิ่มข้อมูล</a>

 


</body>

</html>