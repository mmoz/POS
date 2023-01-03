<!DOCTYPE html>
<html lang="en">
  
<head>
  <title>หน้าแรก</title>
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

    body {
  background-color: #F8F8FF		;
}
    
  </style>
  
</head>
<?php
session_start();
require('connect.php');

$perpage = 8;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 $start = ($page - 1) * $perpage;

$strSQL = "SELECT * FROM product LIMIT {$start} , {$perpage}";
$objQuery = mysqli_query($conn,$strSQL)  or die(mysqli_error());
?>

<body>


<?php include 'banner.php' ; ?>

<?php include 'navbar.php';?>
      
<center>รายการสินค้า</center>
<br>

<center>

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
  <?php if($_SESSION['username'] != NULL){?>
  <input type="submit" class="btn btn-secondary" value="หยิบลงตะกร้า">

  <?php 
    }
else{

?>
  
  <?php  }
    
    ?>

  <td><a href= "productdetail.php?id=<?php echo$objResult["productID"]?>" class="btn btn-info">รายละเอียด</a></td>

  

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
<?php
 $sql2 = "SELECT * FROM product ";
 $query2 = mysqli_query($conn, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
 <nav>

<ul class="pagination justify-content-center">
 <li>
 <a href="indexuser.php?page=1" class = "btn btn-outline-success"aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li><a href="indexuser.php?page=<?php echo $i; ?>" class = "btn btn-outline-success"><?php echo $i; ?></a></li>
 <?php } ?>
 <li>
 <a href="indexuser.php?page=<?php echo $total_page;?>" class = "btn btn-outline-success" aria-label="Next">
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
<?php include 'footer.php';?>


</html>
