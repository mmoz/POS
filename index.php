<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' href='stylezack.css' />


    <head>
        <script type="text/javascript">
            function noBack(){
                window.history.forward()
            }
             
            noBack();
            window.onload = noBack;
            window.onpageshow = function(evt) { if (evt.persisted) noBack() }
            window.onunload = function() { void (0) }
        </script>

<style>
 input:focus {
    outline:none;
}

</style>
    </head>
<?php

require('connect.php'); 
$perpage = 5;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;

$sql = "SELECT * FROM product LIMIT {$start} , {$perpage}";

$result=mysqli_query($conn,$sql);


?>

<?php date_default_timezone_set('Asia/Bangkok');?>



<html>
<head>

<title></title>

</head>

<body>
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
<td><a href= "update.php?id=<?php echo$row["productID"]?>" class="btn btn-primary">แก้ไข</a></td>
<td><a href ="delete.php?idpro=<?php echo$row['productID']?>" class="btn btn-danger"onClick = "return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบ</a></td>
<form action="add.php?idadd=<?php echo$row['productID']?>" method="POST" >
   <input type="hidden" name="productID"  value="<?php echo $row['productID'] ?>" readonly>
    <input type="hidden" name="productname" value="<?php echo $row['productname']?>"readonly>
    <input type="hidden" name="productcategory" value="<?php echo $row['productcategory']?>"readonly>
    <input type="hidden" name="txtdate" value="<?php echo date('Y-m-d H:i:s');?>">
    <input type="hidden" name="remainunit" value="<?php echo $row['remainunit']?>"readonly>
    <td>
    <input type="hidden"  value="<?php echo $row["productID"];?>"name ='remainunit' method ="GET">
    <input type="text" name="add" value=""> 
    <button type="submit" class="btn btn-primary">เพิ่ม</button></td>
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
  



  <?php

$stock = " SELECT remainunit FROM product WHERE remainunit <= 10 ";

$qstock = mysqli_query($conn, $stock);
$cstock = mysqli_num_rows($qstock);

if($cstock > 0){
    echo "<script>";
    echo "alert(' มีสินค้าใกล้หมดกรุณาตรวจสอบ');";
    echo "</script>";
}

?>

<a href= "cstock.php">
  <button type="button" class="btn btn-outline-danger position-relative">
  สินค้าใกล้หมด
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
   <?php echo$cstock; ?>
    <span class="visually">ชิ้น</span>
  </span>
</button>


</div>
</table>
</body>
<?php
 $sql2 = "SELECT * FROM product ";
 $query2 = mysqli_query($conn, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
    <center>
 <nav>
<ul class="pagination justify-content-center">
 <li>
 <a href="index.php?page=1" class = "btn btn-outline-success"aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li><a href="index.php?page=<?php echo $i; ?>" class = "btn btn-outline-success"><?php echo $i; ?></a></li>
 <?php } ?>
 <li>
 <a href="index.php?page=<?php echo $total_page;?>" class = "btn btn-outline-success" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
 </div>
 </div>
 </div>
 </center>
 <script src="bootstrap/js/bootstrap.min.js"></script>

</html>