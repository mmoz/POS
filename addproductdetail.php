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
  <form class="form-inline" action="searchaddproduct.php" class="form-group" method="POST">
    <input class="form-control mr-sm-2" type="search" name ="productname" placeholder="กรอกชื่อสินค้า" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ค้นหา</button>
  </form>

    <th scope="col">รหัสสินค้า</th>
    <th scope="col">ภาพสินค้า</th>
    <th scope="col">ชื่อสินค้า</th>
    <th scope="col">ประเภทสินค้า</th>
    <th scope="col">เพิ่มรายละเอียดสินค้า</th>


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

<td><a href= "addproductdetaildata.php?id=<?php echo$row["productID"]?>" class="btn btn-primary">เพิ่มรายละเอียดสิค้า</a></td>
  <?php } ?>

  



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
 <a href="addproductdetail.php?page=1" class = "btn btn-outline-success"aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li><a href="addproductdetail.php?page=<?php echo $i; ?>" class = "btn btn-outline-success"><?php echo $i; ?></a></li>
 <?php } ?>
 <li>
 <a href="addproductdetail.php?page=<?php echo $total_page;?>" class = "btn btn-outline-success" aria-label="Next">
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