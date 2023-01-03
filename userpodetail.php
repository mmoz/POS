<?php require("connect.php");   ?> 
<?php require("bootstrap.php");   ?> 
<html>
<head>
  
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

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
body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
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

<center><h2>ใบสั่งซื้อ</h2></center>
<div style="width:85%; margin:0px auto;"> 

<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            เลขที่ใบสั่งซื้อ
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                <?php echo $objResult["order_ID"];?>
            </small>
        </h1>
</div>
<div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">ชื่อ นามสกุล</span>
                            <span class="text-600 text-110 text-blue align-middle"><?php echo $objResult["firstname"];?> <?php echo $objResult["lastname"];?></span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                            <?php echo $objResult["address"];?>
                            </div>
                            <div class="my-1">
                            <?php echo $objResult["post"];?>                            </div>
                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600"><?php echo $objResult["tel"];?></b></div>
                        </div>
                    </div>
                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                ที่อยู่ร้าน
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90"></span>71/14 เพชรเกษม <br> เขตหนองแขม แขวงหนองค้างพลู <br> กรุงเทพ 10160</div>
                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">098-8905791</b></div>

                            <!-- <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> Oct 12, 2019</div> -->

                            <!-- <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">Unpaid</span></div> -->
                        </div>
                    </div>

                    
<br>
  <br>

  <div class="mt-4">
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="d-none d-sm-block col-1">รหัสสินค้า</div>
                        <div class="col-9 col-sm-5">ชื่อสินค้า</div>
                        <div class="d-none d-sm-block col-4 col-sm-2">จำนวน</div>
                        <div class="d-none d-sm-block col-sm-2">ราคา</div>
                        <div class="col-2">ราคารวม/ชิ้น</div>
                    </div>
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

    
  

                    <div class="text-95 text-secondary-d3">
                        <div class="row mb-2 mb-sm-0 py-25">
                            <div class="d-none d-sm-block col-1"><?php echo $objResult2["productID"];?></div>
                            <div class="col-9 col-sm-5"><?php echo $objResult3["productname"];?></div>
                            <div class="d-none d-sm-block col-2"><?php echo $objResult2["Qty"];?></div>
                            <div class="d-none d-sm-block col-2 text-95"><?php echo $objResult3["price"];?> </div>
                            <div class="col-2 text-secondary-d2"><?php echo number_format($Total,2);?></div>
                        </div>

                    </div>
	  <?php
 }
  ?>
  
  <div class="text-95 text-secondary-d3">
                        <div class="row mb-2 mb-sm-0 py-25">
                            <div class="d-none d-sm-block col-1"></div>
                            <div class="col-9 col-sm-5">ค่าจัดส่ง</div>
                            <div class="d-none d-sm-block col-2"></div>
                            <div class="d-none d-sm-block col-2 text-95"> 80 </div>
                            <div class="col-2 text-secondary-d2">80.00</div>
                        </div>

                    </div>
                    <div class="text-95 text-secondary-d3">
                        <div class="row mb-2 mb-sm-0 py-25">
                            <div class="d-none d-sm-block col-1"></div>
                            <div class="col-9 col-sm-5">ราคารวมทั้งหมด</div>
                            <div class="d-none d-sm-block col-2"></div>
                            <div class="d-none d-sm-block col-2 text-95">  </div>
                            <div class="col-2 text-secondary-d2"><?php echo number_format($SumTotal+80,2);?></div>
                        </div>

                    </div>
<br>
<div id="non-printable">
<div class="container">
  <div class="center">
<input type="button" class="btn btn-info" value="พิมพ์" onclick="window.print()">
<button class="btn btn-light" onclick="window.history.back();">ย้อนกลับ</button>


</div>
</div>
</div>

<?php
mysqli_close($conn);
?>
</body>
</html>