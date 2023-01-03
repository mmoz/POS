<?php
session_start();
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>

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

  </style>
<body>
<?php
require('connect.php');
require('bootstrap.php');

$id=$_SESSION["usersreg_ID"];

?>
<?php include 'banner.php' ; ?>
<?php include 'navbar.php';?>

<center>
  เลือกขนส่ง
  <br>
  <br>
<table class = "table table-striped primary" table style="width: 50%">
  <tr>
    <td width="82">รหัสสินค้า</td>
    <td width="82">ชื่อสินค้า</td>
    <td width="82">ราคา</td>
    <td width="79">จำนวน</td>
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
		<td><?php echo $objResult["price"];?></td>
		<td><?php echo $_SESSION["strQty"][$i];?></td>
		<td><?php echo number_format($Total,2);?></td>

	  </tr>

	  <?php
	  }
  }
  ?>
  <?php   ?>

    <td align="right" colspan="4">ราคาทั้งหมด <?php echo number_format($SumTotal,2);?> บาท</td><td></td>

    



</table>
<table>
<form action="checkout.php" >
<div class="col-sm-4">
                <input type="radio" name="send_type" id="ems1"  onchange="sum();"  value="80" required="required">
                <img src="uploads/R (1).png" width="150px" height="100px"> + 80 บาท <br>
                </div>
                <!-- <div class="col-sm-4">
                <input type="radio" name="send_type" id="ems2"  onchange="sum();"  value="100" required
                > Kerry Express +100 บาท <br>
                </div> -->
                <br>
                <br>

                <br>
                <tr>
                <label>
                ราคารวมค่าจัดส่ง
                <input type="text" id="totalslip" name="totalslip" readonly="readonly" class="form-control"  required>
                </td>
                <label>
</table>




<input type="submit" name="Submit" value="ยืนยัน">
</form>
</body>
<?php include 'footer.php';?>

<script type="text/javascript">
            function sum() {
                var priceTotal = <?php echo number_format($SumTotal,2);?>; 
                var totalslip = document.getElementById('totalslip').value;

                            if(document.getElementById('ems1').checked){
                                    var ems1 = document.getElementById('ems1').value;
                                    var result = parseInt(priceTotal)+parseInt(ems1);
                                    document.getElementById('totalslip').value = result;
                            }if (document.getElementById('ems2').checked){
                                    var ems2 = document.getElementById('ems2').value;
                                    var result = parseInt(priceTotal)+parseInt(ems2);
                                    document.getElementById('totalslip').value = result;
                            }

                        } 
            </script>

</html>