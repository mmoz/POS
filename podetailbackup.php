<?php require("connect.php");   ?> 
<?php require("bootstrap.php");   ?> 
<html>
<head>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>

.center {
  display: flex;
  justify-content: center;
  align-items: center;
}

@media print 
{ 
#non-printable { display: none; } 
#printable { display: block; } 
} 


</style>

</head>

<br>
<br>
<br>


<?php

$id=$_GET['id'];

$strSQL = "SELECT * FROM orders WHERE order_ID = $id ";
$objQuery = mysqli_query($conn, $strSQL)  or die(mysqli_error());
$objResult = mysqli_fetch_array($objQuery);
?>
<div style="width:85%; margin:0px auto;"> 
<div class="col-sm-6 top-right">
						<h3 class="marginright">รหัสการสั่งซื้อ<?php echo $objResult["order_ID"]?></h3>
						<span class="marginright">วันที่สั่งซื้อ<?php echo $objResult["orderDate"];?></span>
			    </div>
 <table class = "table">
    <tr>
      <th>รหัสการสั่งซื้อ</th>
      <td>
	  <?php echo $objResult["order_ID"];?></td>
    </tr>
    <tr>
      <th>วันที่</th>
      <td>
	  <?php echo $objResult["orderDate"];?></td>
    </tr>
    <tr>
      <th>ชื่อ</th>
      <td>
	  <?php echo $objResult["firstname"];?></td>
    </tr>
    <tr>
      <th>นามสกุล</th>
      <td>
	  <?php echo $objResult["lastname"];?></td>
    </tr>
    <tr>
      <th>ที่อยู่</th>
      <th><?php echo $objResult["address"];?></th>
    </tr>
    <tr>
      <th>เบอร์โทรศัพท์</th>
      <td><?php echo $objResult["tel"];?></td>
    </tr>
   

  </table>

  <br>

<table class = "table">
  <tr>
    <th >รหัสสินค้า</th>
    <th>ชื่อสินค้า</th>
    <th>จำนวน</th>
    <th>ราคา</th>
    <th>ราคา</th>
  </tr>
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
    $post = 100;
		$SumTotal = $SumTotal + $Total;
	  ?>
	  <tr>
      
		<td><?php echo $objResult2["productID"];?></td>
		<td><?php echo $objResult3["productname"];?></td>
		<td><?php echo $objResult2["Qty"];?>   ชิ้น</td>
		<td><?php echo $objResult3["price"];?>  บาท</td>
		<td><?php echo number_format($Total,2);?>  บาท</td>
	  </tr>
	  <?php
 }
  ?>
  <tr>
  <td colspan="1"></td>
  <td>ค่าจัดส่ง</td>
  <td></td>
  <td>100 บาท</td>
  <td>100.00 บาท</td>



</tr>
      <tr>
    <td colspan="3"></td>
      <td>ราคารวม</td>
      <td><?php echo number_format($SumTotal+100,2);?>  บาท</td>

</tr>

</table>
<br>
<div id="non-printable">
<div class="container">
  <div class="center">
<input type="button" class="btn btn-info" value="ปริ้นท์" onclick="window.print()">
<button class="btn btn-light" onclick="window.history.back();">ย้อนกลับ</button>


</div>
</div>
</div>

<?php
mysqli_close($conn);
?>
</body>
</html>