
<?php require("connect.php");  ?>

<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="Project\mystyle.css">
   <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Format</title>
    </head>

    
<body>


  <br>


<?php  
$sql = "SELECT *  FROM cart";
$result = mysqli_query($conn, $sql);
?>
<?php date_default_timezone_set('Asia/Bangkok');
?>
<form name="form" method="post" action="cartmultiinspc.php?Action=Save">
<table class="table table-striped">
  <tr>
  </tr>
<tr>
  <td></td>
  <td>ชื่อ</td>
  <td></td>
  <td></td>
  <td>จำนวนที่จะส่งออก</td>
  <td>ราคา</td>
  <td>ราคารวมต่อชิ้น</td>

      
</tr>

  
<?php
$i =0;
while($dataResult = mysqli_fetch_array($result))
{
	$i = $i + 1;
?>


  <tr>
    <td>
    <div class="row">

    <input type="hidden" name="txtstat<?php echo $i;?>" value="ขาย">
	<input type="hidden" name="hdnproductID<?php echo $i;?>"  value="<?php echo $dataResult["productID"];?>">
	<input type="hidden" name="txtproductID<?php echo $i;?>" value="<?php echo $dataResult["productID"];?>">

	</td>

    <td><input type="text" name="txtproductname<?php echo $i;?>" value="<?php echo $dataResult["productname"];?>" readonly></td>
    <td><input type="hidden"  name="txtdate<?php echo $i;?>" id="txtdate" value="<?php echo date('Y-m-d  H:i:s');?>"><td>
    <td><input type="number"  name="txtqty<?php echo $i;?>" id="txtqty<?php echo $i;?>" onclick ="calc()" onkeyup="calc()" value ="" min="1" max="<?php echo $dataResult["remainunit"];?>" oninvalid="this.setCustomValidity('สินค้าไม่เพียงพอ')" oninput="setCustomValidity('')"></td>
    <td><input type="number" disabled="disabled" name="txtprice<?php echo $i;?>" id="txtprice<?php echo $i;?>" onkeyup="calc()" value="<?php echo $dataResult["price"];?>" ></td>
    <td><input type="text"  class = "sum" name="txtresult<?php echo $i;?>" id="txtresult<?php echo $i;?>" value="" readonly ></td>
    <td><input type="hidden" name="txtproductcategory<?php echo $i;?>" value="<?php echo $dataResult["productcategory"];?>" readonly></td>
    <td><a href ="delpos.php?idpro=<?php echo$dataResult['cartID']?>" class="btn btn-danger"onClick = "return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบ</a><td>

</div>
  </tr>
    <td></td>
  </tr>
  

<?php
}
?>
<tr>
<td colspan="4"></td>
<input type="hidden"   name="txtorderdate" value="<?php echo date('Y-m-d  H:i:s');?>">
<td>ราคารวมทั้งหมด </td>
<td><input type="number" readonly="readonly" name="total" id="total" /> บาท </td>

</tr>
</table>






  <input type="hidden" name="hdnNo" value="<?php echo $i;?>">
  <br>
  <br>
  <center>
  <td><input class="btn btn-primary" type="submit" name="submit" value="ยืนยัน"></td>
  <a href = "clearcartpc.php?iddel=remove"><button type="button">ลบสินค้าทั้งหมด</button></a>
  <center>


</form>

</body>
<script src = "index.js" charset = "utf-8">
  </script>
  


</html>


