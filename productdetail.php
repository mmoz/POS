<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<?php
require("connect.php");
$id=$_GET["id"];
$sql="SELECT * FROM product WHERE productID=$id";
$result = mysqli_query($conn,$sql);

?>
<html>
<head>
<title></title>
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
<body>
<?php include 'banner.php' ; ?>

<?php include 'navbar.php';?>
      


<?php
      $id = $_GET['id'];
$strSQL = "SELECT * FROM product WHERE productID = $id";
$objQuery = mysqli_query($conn, $strSQL) or die(mysql_error($conn));
$objResult = mysqli_fetch_array($objQuery)
?>


<p>

<div style="width:60%; margin:0px auto; background-color:#D90000;" class="fs-1 text-white"> 

<p><?php echo $objResult["productname"];?></p>

</div> 



<div style="width:60%; margin:0px auto;"> 

<table border="1" class="table">
  <tr>
<td rowspan="20" width="600px">
<img src="uploads/<?php echo $objResult["pic"];?>" width="60%">
</td>
</tr>

<tr>
<td>
  
</td>
</tr>
<tr>
<td width="100">
  <h6 >รหัสสินค้า </h6>
</td>
<td>
<h6><?php echo $objResult["productID"];?></h6>
</td>
</tr>
<tr>
<td>
<h6>ประเภทสินค้า </h6>
</td>
<td>
<h6><?php echo $objResult["productcategory"];?></h6>
</td>
</tr>
<tr>
<td>
<h6>ราคา </h6>
</td>
<td>
<h6><?php echo $objResult["price"];?> บาท</h6>
</td>
</tr>
<tr>
<td>
<h6>จำนวนคงเหลือ </h6>
</td>
<td>
<h6><?php echo $objResult["remainunit"];?>
</tr>

</table>

<table  border="1" class="table">
<tr>
  <td>
  <h6>รายละเอียดสินค้า</h6>
</td>
</tr>
<tr>
  <td>
    
  <?php echo $objResult["productdetail"];?>





    <td>
</tr>
</table>

    </div>
<!-- ตารางกลาง -->



  </div>



</div>


<!-- <footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer> -->

</body>
</html>