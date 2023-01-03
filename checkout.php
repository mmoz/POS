<?php
session_start();
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
require('connect.php');
require('bootstrap.php');

$id=$_SESSION["usersreg_ID"];

?>
<center>


<?php $strSQL = "SELECT * FROM usersreg WHERE usersreg_ID = $id" ; 
$objQuery = mysqli_query($conn,$strSQL);

($row = mysqli_fetch_array($objQuery))




?>
<?php include 'banner.php' ; ?>
<?php include 'navbar.php';?>
<table class = "table table-striped primary" border="1">
<tr>
  รายละเอียดสินค้า
<table class = "table table-striped primary" table style="width: 60%" border="1">
  <tr>
    <td width="82">รหัสสินค้า</td>
    <td width="82">ชื่อสินค้า</td>
    <td width="82">จำนวน</td>
    <td width="79">ราคา</td>
    <td width="100">ราคารวม</td>

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
		<td><?php echo $_SESSION["strproductID"][$i];?></td>
		<td><?php echo $objResult["productname"];?></td>
    <td><?php echo $_SESSION["strQty"][$i];?></td>
		<td><?php echo $objResult["price"];?></td>
		<td><?php echo number_format($Total,2);?></td>

	  </tr>

	  <?php
	  }
  }
  ?>
  <?php   ?>
  <tr>
  <td colspan="1"></td>
  <td>ค่าจัดส่ง</td>
  <td></td>
  <td>100 </td>
  <td>100.00 </td>



</tr>
    <td align="right" colspan="4">ราคาทั้งหมด <?php echo number_format($SumTotal+80,2);?> บาท</td><td></td>



</table>
</center>
<br>

<center>
ข้อมูลลูกค้า
<br>
<br>
<form name="form1" method="post" action="save.php" enctype="multipart/form-data">
  <table class = "table table-striped"  style="width: 60%" border ="1">
  <tr><td></td>
      <td width="217"><input type="hidden" name="txtusersreg_ID" value="<?php echo $row["usersreg_ID"];?>"required readonly></td>
    </tr>
    <tr>
      <td width="71">ชื่อ</td>
      <td width="217"><input type="text" name="txtfirstname" value="<?php echo $row["firstname"];?>"required></td>
    </tr>
    <tr>
      <td width="71">นามสกุล</td>
      <td width="217"><input type="text" name="txtlastname"value="<?php echo $row["lastname"];?>"required></td>
    </tr>
    <tr>
      <td>ที่อยู่</td>
      <td><input type ="text" name="txtaddress" value="<?php echo $row["address"];?>"required></textarea></td>
    </tr>
    <td>รหัสไปรษณีย์</td>
      <td><input type ="text" name="txtpost" value="<?php echo $row["post"];?>"required></textarea></td>
    </tr>
    <tr>
      <td>เบอร์โทรศัพท์</td>
      <td><input type="int" name="txttel" value="<?php echo $row["tel"];?>"required maxlength="10"></td>
    </tr>
    <tr>
    <td><input type="hidden" name="postatus" value="ยังไม่ชำระเงิน"required></td>
</tr>
<tr>
  
  
</tr>

  </table>
    <input type="submit" name="Submit" value="ยืนยัน">
</form>


</center>
</tr>
</table>

</body>
<?php include 'footer.php';?>

</html>