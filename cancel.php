<?php require("connect.php");   ?> 
<?php require("bootstrap.php");   ?> 
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<div style="width:80%; margin:0px auto;"> 
</div>

<center>
<br>
  <br>
  <br>
<?php

$id=$_GET['id'];

$strSQL = "SELECT * FROM orders WHERE order_ID = $id ";
$objQuery = mysqli_query($conn,$strSQL)  or die(mysqli_error($conn));
$objResult = mysqli_fetch_array($objQuery);
?>

<div style="width:100%; margin:0px auto;"> 

<table border="1" class="table"> 
  <tr>
    <td>รหัสใบสั่งซื้อ</td>
    <td>วันที่สั่งซื้อ</td>
    <td>ชื่อ</td>
    <td>นามสกุล</td>
    <td>ที่อยู่</td>
    <td>เบอร์โทร</td>
  </tr>
    <tr>
      <td ><?php echo $objResult["order_ID"];?></td>
      <td ><?php echo $objResult["orderDate"];?></td>
      <td ><?php echo $objResult["firstname"];?></td>
      <td ><?php echo $objResult["lastname"];?></td>
      <td ><?php echo $objResult["address"];?></td>
      <td ><?php echo $objResult["tel"];?></td>
    </tr>
  </table>

  
  <form name="form" method="POST" action="canceldata.php?Action=Save">

<table border="1" class="table">
  <tr>
    <td >ลำดับ</td>
    <td >รหัสสินค้า</td>
    <td >ชื่อสินค้า</td>
    <td >จำนวน</td>
    <td >ราคา</td>
    <td ></td>
    <td ></td>

  </tr>
<?php
$i=0;
$n=0;
$Total = 0;
$SumTotal = 0;
$sum=0;
$strSQL2 = "SELECT * FROM orders_detail WHERE order_ID = $id ";
$objQuery2 = mysqli_query($conn,$strSQL2)  or die(mysql_error());





while($objResult2 = mysqli_fetch_array($objQuery2))
{  
    $i=$i+1;
    $n++;
		$strSQL3 = "SELECT * FROM product WHERE productID = '".$objResult2["productID"]."' ";
		$objQuery3 = mysqli_query($conn,$strSQL3)  or die(mysql_error());
		$objResult3 = mysqli_fetch_array($objQuery3);
		$Total = $objResult2["Qty"] * $objResult3["price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
      <?php
if($objResult3["remainunit"] < $objResult2["Qty"]){
            $check=1;
        }else{
            $check=0;

        }
        $sum = $sum + $check;
        ?>
	<tr>
        <td><?php echo $n;?></td>
        
        

		<td>
        <input type="hidden" name="hdnproductID<?php echo $i;?>"value="<?php echo $objResult2["productID"];?>">
            
        <input name="txtproductID<?php echo $i;?>"value="<?php echo $objResult2["productID"];?>" readonly></td>
		<td><input name="txtproductname<?php echo $i;?>" value="<?php echo $objResult3["productname"]; ?>" readonly></td>
        <input type="hidden" name="txtproductcategory<?php echo $i;?>" value="<?php echo $objResult3["productcategory"];?>">
        <input type="hidden" name="txtproductcategory<?php echo $i;?>" value="<?php echo $objResult3["remainunit"];?>">
        <input type ="hidden"name="txtdate<?php echo $i;?>" value="<?php echo date('Y-m-d H:i:s');?>">
        <input type = "hidden" name="txtstat<?php echo $i;?>"value="ขาย">
        <td><input name="txtqty<?php echo $i;?>" type="text" value="<?php echo $objResult2["Qty"];?>" readonly/></td>
		<td><?php echo number_format($objResult3["price"],2);?></td>
		<td><input type="hidden" name="total<?php echo $i;?>"value="<?php echo $Total;?>"></td>
		
        <td>
        <input name="txtaddunit<?php echo $i;?>" type="hidden"      value="<?php echo $objResult2["Qty"];?>"></td>
		<td>
  
<?php
 }
?>
<tr>
  <td colspan="2"></td>
  <td>ค่าจัดส่ง</td>
  <td></td>
  <td>80 บาท</td>



</tr>
      <tr>
  <tr>  
    <td colspan="4"></td>
      <td>ราคารวมทั้งหมด : </td>
      <td><?php echo number_format($SumTotal+80,2);?></td>
      <td>บาท</td>
</tr>



</table>





<input type="hidden" name="txtpoid" value="<?php echo $id;?>">
<input class="btn btn-danger" type="submit" name="submit" value="ยกเลิกคำสั่งซื้อ">
<input type="hidden" name="hdnNo" value="<?php echo $i;?>">
</form>
<button class="btn btn-light" onclick="window.history.back();">ย้อนกลับ</button>


<?php
mysqli_close($conn);
?>
</body>
</html>