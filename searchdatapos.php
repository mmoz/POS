<?php include 'bootstrap.php' ?> 

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
<?php include 'indexform.php';?>

<div class="table">
<table class="table  table table-striped table-Info" >
  <tr>
    <thead>
  <form class="form-inline" action="searchdatapos.php" class="form-group" method="POST">
    <input class="form-control mr-sm-2" type="search" name ="productname" placeholder="กรอกชื่อสินค้า" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ค้นหา</button>
  </form>

    <th scope="col">รหัสสินค้า</th>
    <th scope="col">รูปภาพ</th>
    <th scope="col">ชื่อสินค้า</th>
    <th scope="col">ประเภทสินค้า</th>
    <th scope="col">จำนวนที่เหลือ</th>
    <th scope="col">ราคา</th>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>



</thead>
<tbody>


 
  <?php
while ($dataResult = mysqli_fetch_assoc($result)) {
?>

<td align=""><?php echo $dataResult["productID"]; ?></td>
<td><img src="uploads/<?php echo $dataResult["pic"]?>"width="150px" height="100px"></td>

<td align=""><?php echo $dataResult["productname"]; ?></td>
<td align=""><?php echo $dataResult["productcategory"]; ?></td>
<td align=""><?php echo $dataResult['remainunit']; ?></td>
<td align=""><?php echo $dataResult["price"]; ?></td>

<td align="center">
<a href = "cartinsert.php?id=<?php echo $dataResult["productID"];?>">
<button type="button" class="btn btn-outline-info">เพิ่มสินค้า</button></a>
</td>

    <td>
    </td>
    <td>
    <form action="add.php?idadd=<?php echo$row['productID']?>" method="POST" >
    <input type="hidden"  value="<?php echo $row["productID"];?>"name ='remainunit'>
    </form>
    <form action="deletestock.php?idde=<?php echo$row['productID']?>" method="POST" >
    <input type="hidden"  value="<?php echo $row["productID"];?>"name ='remainunit'>
  



</td>


  </tr>
  </tbody>


  <?php } ?>
  

  <a href="cartmultiins.php" class="btn btn-success">ชำระเงิน</a>
  <a href="pos.php" class="btn btn-primary">ย้อนกลับ</a>


  

</table>
</div>


</body>
</html>