<?php include 'bootstrap.php' ?>
    <head>
        <!-- <script type="text/javascript">
            function noBack(){
                window.history.forward()
            }
             
            noBack();
            window.onload = noBack;
            window.onpageshow = function(evt) { if (evt.persisted) noBack() }
            window.onunload = function() { void (0) }
        </script> -->
    </head>
<?php

require('connect.php'); 

$sql = "SELECT * FROM product";

$result=mysqli_query($conn,$sql);

?>


<html>
<head>

<title></title>


</head>
<body style="background-color:#E1E5EA;"->
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

  

</table>
</div>


</body>


</html>