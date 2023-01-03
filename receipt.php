<?php require("connect.php");   ?> 
<html>

<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php date_default_timezone_set('Asia/Bangkok'); ?>
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

body {
    margin-top: 20px;
}
</style>

    <title></title>
</head>

<body>
<?php 
$id=$_GET["id"];
$sql = "SELECT bill.bill_ID, report.productname, report.qty,report.date,report.pricetotal,bill.total
FROM report 
INNER JOIN bill ON bill.date=report.date WHERE bill_ID=$id";
$result = mysqli_query($conn,$sql);
$sql2 = "SELECT*
FROM bill 
WHERE bill_ID = $id";
$result1 = mysqli_query($conn,$sql2);
 $rowtotal = mysqli_fetch_assoc($result1)
 ?>

<br>
<br>
<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>ร้านไหว้เจ้าเจ้เปิ้ล</strong>
                        <br>
                        71/14 เพชรเกษม 81/1
                        <br>
                        เขตหนองแขม แขวงหนองค้างพลู
                        <br>
                        กรุงเทพ 10160
                        <br>
                        <abbr title="Phone">เบอร์โทรศัพท์:</abbr> 098-8905791
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em><?php echo $rowtotal["date"] ?></em>
                    </p>
                    <p>
                        <em>เลขที่ใบเสร็จ #:<?php echo $rowtotal["bill_ID"] ?></em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h3>ใบเสร็จรับเงิน</h3>
                </div>
                </span>
<table class="table table-hover">
                    <thead>
                        <tr>
          <th>สินค้า</th>
                            <th>จำนวน</th>
                            <!-- <th class="text-center"></th> -->
                            <th class="text-center">ราคา</th>
                        </tr>
                    </thead>
 
<?php
while ($dataResult = mysqli_fetch_assoc($result)) {
?>
<tbody>
                        <tr>
                            <td class="col-md-9"><em><?php echo $dataResult["productname"];?></em></h4></td>
                            <td class="col-md-1" style="text-align: center"><?php echo $dataResult["qty"];?> </td>
                            <td class="col-md-1 text-center"><?php echo $dataResult["pricetotal"];?></td>
                        </tr>

<?php } ?>
</tr>
</td>
<td></td>
<td class="text-right"><h6><strong>ราคารวมทั้งหมด </strong></h6></td>
    <td class="text-center text-danger"><h4><strong><?php echo $rowtotal["total"]?></strong></h4></td>
</table>
</div>
<div id="non-printable">
<div class="container">
  <div class="center">
<input type="button" class="btn btn-info" value="พิมพ์" onclick="window.print()">
<a href = "bill.php" class="btn btn-Secondary">ย้อนกลับ</button></a>

</div>
</div>
</div>
</body>

</html>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

