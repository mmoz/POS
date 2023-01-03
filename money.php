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


?>







<body>


<?php include 'banner.php' ; ?>

<?php include 'navbar.php';?>

      <?php
$id=$_GET['id'];

$strSQL = "SELECT * FROM orders WHERE order_ID = $id ";
$objQuery = mysqli_query($conn, $strSQL)  or die(mysqli_error());
$objResult = mysqli_fetch_array($objQuery);
?>

<center><h5>ชำระเงิน</h5></center>
<br>
<div style="width:80%; margin:0px auto;"> 
<br>
<table class = "table">

<th class="text-center">เลขที่ใบสั่งซื้อ </th>



<tr>
<td align="center"><?php echo $objResult["order_ID"]; ?></td>
</tr>


</div>

</table>
                  


    
<div style="width:100%; margin:0px auto;"> 
<center>
<table class = "table table-striped primary" table style="width: 60%" border="1">
  <th>รหัสสินค้า</th>
  <th>ชื่อสินค้า</th>
  <th>จำนวน</th>
  <th>ราคา</th>
  <th>ราคารวม/ชิ้น</th>
  <?php

$Total = 0;
$SumTotal = 0;

$strSQL2 = "SELECT * FROM orders_detail WHERE order_ID = $id ";
$objQuery2 = mysqli_query($conn,$strSQL2)  or die(mysql_error());

while($objResult2 = mysqli_fetch_array($objQuery2))
{
		$strSQL3 = "SELECT * FROM product WHERE productID = '".$objResult2["productID"]."' ";
		$objQuery3 = mysqli_query($conn,$strSQL3)  or die(mysql_error());
		$objResult3 = mysqli_fetch_array($objQuery3);
		$Total = $objResult2["Qty"] * $objResult3["price"];
		$SumTotal = $SumTotal + $Total;
	  ?>


          <tr>
                          <td>  <?php echo $objResult2["productID"];?></td>
                         <td>   <?php echo $objResult3["productname"];?></td>
                          <td> <?php echo $objResult2["Qty"];?></td>
                          <td>  <?php echo $objResult3["price"];?> </td>
                           <td> <?php echo number_format($Total,2);?></td>



            </tr>     
            <?php                 
          }
          ?>
            
            <td> </td>


                        <td> ค่าจัดส่ง</td>
                        <td> </td>

                           <td> 80</td>
                          <td>  80.00</td>
<tr>
<td> </td>
<td> </td>
<td> </td>

                           <td> ราคารวมทั้งหมด</td>
                           <td> <?php echo number_format($SumTotal+80,2);?></td>
</tr>
  </table>
</center>
<br>
</div>


</div>
<div style="width:55%; margin:0px auto;"> 
<table class ="table">
<form name="form1" method="post" action="moneydata.php" enctype="multipart/form-data">
<input type="hidden"  value="<?php echo $objResult["order_ID"];?>"name ="order_ID">
 <thead>
<th>ชื่อบัญชี</th>
<th>ธนาคาร</th>
<th>เลขที่บัญชี</th>
<th></th>


</thead>
<tr>
  <td>นายคุณากร สมศรีอักษรแสง</td>
  <td>กรุงไทย</td>
  <td>191-0-85146-9</td>


<td>
<img src="uploads/R.png" width="60px" height="60px"> <br>
</td>
</tr>

<tr>
<td>แนบหลักฐานการโอนเงิน
    <input type="file" name="slip" value="" required>

</tr>

  
</table>
</div>

<center>
    <input type="submit" name="Submit" value="ยืนยัน">
</center>

</form>
</div>


</body>
<?php include 'footer.php';?>

</html>