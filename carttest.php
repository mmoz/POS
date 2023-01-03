
<?php require("connect.php");  ?>

<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="Project\mystyle.css">
   <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>

    <title>Format</title>
    </head>

    
<body>


  <br>


<?php  
$sql = "SELECT *  FROM cart";
$result = mysqli_query($conn, $sql);
?>

<form name="form" method="post" action="cartmultiinspc.php?Action=Save">
<table class="table table-striped">
  <tr>
    <td  align="center"><input class="btn btn-primary" type="submit" name="submit" value="ยืนยัน"></td>
  </tr>
<tr>
  <td></td>
  <td>ชื่อ</td>
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
	<input type="hidden" name="hdnproductID<?php echo $i;?>"  value="<?php echo $dataResult["productID"];?>">
	<input type="hidden" name="txtproductID<?php echo $i;?>" value="<?php echo $dataResult["productID"];?>">
	</td>
    <td><input type="text" name="txtproductname<?php echo $i;?>" value="<?php echo $dataResult["productname"];?>" readonly></td>
    
    
    <td><input type="number"  name="txtqty<?php echo $i;?>" id="txtqty<?php echo $i;?>" onkeyup="calc()" ></td>
    <td><input type="number" disabled="disabled" name="txtprice<?php echo $i;?>" id="txtprice<?php echo $i;?>" onkeyup="calc()" value="<?php echo $dataResult["price"];?>" ></td>
    <td><input type="text"  class = "sum" name="txtresult<?php echo $i;?>" id="txtresult<?php echo $i;?>" value="" ></td>

  </tr>
    <td></td>
  </tr>
  

<?php
}
?>
</table>
<td><input name="subtotal" readonly id="subtotal" class="sub" type="text" /></td>






  <input type="hidden" name="hdnNo" value="<?php echo $i;?>">
</form>
<td  align="center"><input class="btn btn-primary" type="submit" name="submit" value="ยืนยัน"></td>

<a href = "clearcartpc.php?iddel=remove"><button type="button">ล้างตะกร้า</button></a>
</body>
<script type="text/javascript">

$(document).ready(function () {
        $("#my-table").keyup(function (event) {
            calc();
        });

        calc();
    });
    var tax_amount = 0;
    function calculateTotals() {
        var sub = 0;
        $("#my-table .targetfields").each(function () {

            var qty = parseInt($(this).find(".txtqty").val());
            var price = parseInt($(this).find(".txtprice").val());
            var tax_rate = parseInt($(this).find(".tax").val());
            if (isNaN(qty))
                qty = 0;
            if (isNaN(rate))
                rate = 0;
            if (isNaN(tax_rate))
                tax_rate = 0;

            var subtotal = qty * price;
            $(this).find(".total").val(subtotal);

            if (!isNaN(subtotal))
                sub += subtotal;
            tax_amount = sub * tax_rate / 100;
            $(this).find(".taxation").val(tax_amount);
        });
        $(".sub").val(sub);
$(".grandtotal").val(sub+tax_amount);
    }
    </script>



</html>
