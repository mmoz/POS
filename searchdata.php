<?php include 'bootstrap.php'?>
<?php
require("connect.php");
$productname = $_POST['productname'];

$sql = "SELECT * FROM product WHERE productname LIKE '%$productname%' ORDER BY productname ASC";
$result = mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
$order=1;
?>

<html>
<head>
<title></title>

</head>
<body style="background-color:#E1E5EA;"->
<?php include 'indexform.php';?>
<div class="table">
<table class="table table-light" >
  <tr>
    <thead>
  <form class="form-inline" action="searchdata.php" class="form-group" method="POST">
    <input class="form-control mr-sm-2" type="search" name ="productname" placeholder="กรอกชื่อสินค้า" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ค้นหา</button>
  </form>

  <th scope="col">รหัสสินค้า</th>
    <th scope="col">ภาพสินค้า</th>
    <th scope="col">ชื่อสินค้า</th>
    <th scope="col">ประเภทสินค้า</th>
    <th scope="col">จำนวนที่เหลือ</th>
    <th scope="col">ราคา</th>
    <th scope="col"></th>
    <th scope="col">แก้ไข</th>
    <th scope="col">ลบ</th>
    <th scope="col">เพิ่มจำนวนสินค้า</th>

</tr>
</thead>
<tbody>
  <?php 
  
  while($row=mysqli_fetch_assoc($result)){
    ?>

 
</tbody>
  <tr>
  <td align=""><?php echo $row["productID"]; ?></td>
  <td><img src="uploads/<?php echo $row["pic"]?>" width="150px" height="100px"></td>

  <td align=""><?php echo $row["productname"]; ?></td>
<td align=""><?php echo $row["productcategory"]; ?></td>
<td align=""><?php echo $row['remainunit']; ?></td>
<td align=""><?php echo $row["price"]; ?></td>
  <form action="add.php?idadd=<?php echo$row['productID']?>" method="POST" >

    <input type="hidden" name="productID" value="<?php echo $row['productID'] ?>" readonly>
    <input type="hidden" name="productname" value="<?php echo $row['productname']?>"readonly>
    <input type="hidden" name="productcategory" value="<?php echo $row['productcategory']?>"readonly>
    <input type="hidden" name="txtdate" value="<?php echo date('Y-m-d H:i:s');?>"><td>
    <input type="hidden" name="remainunit" value="<?php echo $row['remainunit']?>"readonly>


    <td>
      <a href= "update.php?id=<?php echo$row["productID"]?>" class="btn btn-primary">แก้ไข</a>
    </td>
    <td>
    <a href ="delete.php?idpro=<?php echo$row['productID']?>" class="btn btn-danger"onClick = "return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบ</a>
    <input type="hidden"  value="<?php echo $row["productID"];?>"name ='remainunit' method ="GET">
    <td> <input type="text" name="add" value=""> 
    <button type="submit" class="btn btn-primary">เพิ่ม</button>
    <input type="hidden" name="stat" value="นำเข้า"></td> 
    </form>
    <form action="deletestock.php?idde=<?php echo$row['productID']?>" method="POST" >
    <input type="hidden"  value="<?php echo $row["productID"];?>"name ='remainunit'>
    </form>
    <form method="POST" action="form.php" style="position: fixed; left: -9999px;">

</form>
  </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>





</td>


  </tr>
 

  <?php } ?>
  <a href= "insert.php" class="btn btn-primary">เพิ่มข้อมูล</a>
  


<a href= "index.php" class="btn btn-primary">ย้อนกลับ</a>



</div>
</body>
</html>