<!DOCTYPE html>
<html lang="en">
  
<head>
  <title></title>
<?php include 'bootstrap.php' ?>

  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<?php
session_start();
require('connect.php');
$strSQL = "SELECT * FROM product";
$objQuery = mysqli_query($conn,$strSQL)  or die(mysqli_error());
?>

<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Banner</h1>      
    <p></p>
  </div>
</div>

<?php include 'navbar.php';?>
      


<center>
<a href="show.php">ตะกร้าสินค้า</a>

<div style="width:80%; margin:0px auto;"> 
</div> 


<div style="width:80%; margin:0px auto;"> 
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">

  <?php

  
  while($objResult = mysqli_fetch_array($objQuery))
  
  {


  ?>


<form action="order.php" method="post">
<div class="card border mb-3" style="max-width: 18rem;">สินค้า
  <div class="card-header"><img src="uploads/<?php echo $objResult["pic"];?>" width="150px" height="150px"></div>
  <div class="card-body text">
    <h5 class="card-title"><?php echo $objResult["productname"];?></h5>
    <p class="card-text"><?php echo $objResult["price"];?> บาท</p>
  </div>
  <div class="card-footer bg-transparent border-Dark">
  
  <?php if($objResult["remainunit"]!=0){
?>
  
  <input type="hidden" name="txtproductID" value="<?php echo $objResult["productID"];?>" size="2"> 
  <input type="hidden" name="txtQty" value="1" size="2"> 
  <input type="submit" class="btn btn-secondary" value="เพิ่ม">

  <?php
} else {echo "สินค้าหมด";}
  ?>
</div>
</div>
</form>

  <?php
  }
  ?>

</div>
</div>


</center>

<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>

</body>
</html>
