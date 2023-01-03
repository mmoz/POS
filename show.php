<?php
session_start();

@ini_set('display_errors', '0');

?>
<?php include 'banner.php' ; ?>

<?php include 'navbar.php';?>
<?php include 'bootstrap.php' ?>

<html>
<head>
<title>ตะกร้าสินค้า</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php
require('connect.php');
?>
  <form action="updateqty.php" method="post">
<table class = "table table-striped table-hover">
  <tr>
    <td>รหัสสินค้า</td>
    <td>ชื่อสินค้า</td>
    <td>ราคา</td>
    <td>จำนวน</td>
	<td>สินค้าคงเหลือ</td>

    <td>ราคารวม</td>
    <td>ลบ</td>
  </tr>
  <?php
  $Total = 0;
  $SumTotal = 0;

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strproductID"][$i] != "")
	  {
		$strSQL = "SELECT * FROM product WHERE productID = '".$_SESSION["strproductID"][$i]."' ";
		$objQuery = mysqli_query($conn,$strSQL)  or die(mysql_error());
		$objResult = mysqli_fetch_array($objQuery);
		$Total = $_SESSION["strQty"][$i] * $objResult["price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
	  <tr>
		<td><?php echo $_SESSION["strproductID"][$i];?><input type="hidden" name="txtproductID<?php echo $i;?>" value="<?php echo $_SESSION["strproductID"][$i];?>"></td>
		<td><?php echo $objResult["productname"];?></td>
		<td><?php echo $objResult["price"];?></td>
		<td><input type="number" name="txtQty<?php echo $i;?>" min="1" max="<?php echo $objResult["remainunit"];?>"oninvalid="this.setCustomValidity('สินค้าไม่เพียงพอ')" oninput="setCustomValidity('')" value="<?php echo $_SESSION["strQty"][$i];?>" size="2"></td>
		<td><?php echo $objResult["remainunit"];?></td>

		<td><?php echo number_format($Total,2);?></td>
		<td><a href="delqty.php?Line=<?php echo $i;?>">ลบ</a></td>
	  </tr>
	  <?php
	  }
  }
  ?>
</table>
<table class ="table" border="0">
  <tr>
  <td><input type="submit" value="คำนวนราคาสินค้า"></td>
      <td align ="right">ราคารวมทั้งหมด</td>
  <td align=""> <?php echo number_format($SumTotal,2);?></td>
  </tr>
  </table>
</form>
<center>
<br><br><a href="indexuser.php">เลือกสินค้า</a>
<?php
	if($SumTotal > 0)
	{
?>
	| <a href="productorderdetail.php" >ชำระเงิน</a>
<?php
	}
?>
</center>

<?php
mysqli_close($conn);
?>

</body>

</html>

<?php /* This code download from www.ThaiCreate.Com */ ?>