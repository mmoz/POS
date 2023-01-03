<html>
    <?php require('connect.php'); ?>
<head>
<title>ThaiCreate.Com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php

$strSQL = "SELECT * FROM orders WHERE order_ID = '".$_GET["order_ID"]."' ";
$objQuery = mysqli_query($conn,$strSQL)  or die(mysqli_error($conn));
$objResult = mysqli_fetch_array($objQuery);
?>

 <table width="304" border="1">
    <tr>
      <td width="71">OrderID</td>
      <td width="217">
	  <?php echo $objResult["order_ID"];?></td>
    </tr>
    <tr>
      <td width="71">ชื่อ</td>
      <td width="217">
	  <?php echo $objResult["firstname"];?></td>
    </tr>
    <tr>
      <td>นามสกุล</td>
      <td><?php echo $objResult["lastname"];?></td>
    </tr>
    <tr>
      <td>ที่อยู่</td>
      <td><?php echo $objResult["address"];?></td>
    </tr>
    <tr>
      <td>เบอร์โทร</td>
      <td><?php echo $objResult["tel"];?></td>
    </tr>
  </table>

  <br>

<table width="400"  border="1">
  <tr>
    <td width="101">ProductID</td>
    <td width="82">ProductName</td>
    <td width="82">Price</td>
    <td width="79">Qty</td>
    <td width="79">Total</td>
  </tr>
<?php

$Total = 0;
$SumTotal = 0;

$strSQL2 = "SELECT * FROM orders_detail WHERE order_ID = '".$_GET["order_ID"]."' ";
$objQuery2 = mysqli_query($conn,$strSQL2)  or die(mysqli_error());

while($objResult2 = mysqli_fetch_array($objQuery2))
{
		$strSQL3 = "SELECT * FROM product WHERE productID = '".$objResult2["productID"]."' ";
		$objQuery3 = mysqli_query($conn,$strSQL3)  or die(mysqli_error());
		$objResult3 = mysqli_fetch_array($objQuery3);
		$Total = $objResult2["Qty"] * $objResult3["price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
	  <tr>
		<td><?php echo $objResult2["productID"];?></td>
		<td><?php echo $objResult3["productname"];?></td>
		<td><?php echo $objResult3["price"];?></td>
		<td><?php echo $objResult2["Qty"];?></td>
		<td><?php echo number_format($Total,2);?></td>
	  </tr>
	  <?php
 }
  ?>
  <button onclick="document.location='logoutusers.php'">logout</button>

</table>
Sum Total <?php echo number_format($SumTotal,2);?>


</body>
</html>