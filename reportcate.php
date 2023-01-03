<?php include 'bootstrap.php' ?>


    <head>

<?php

require('connect.php'); 



$sql = "SELECT productcategory,qty,SUM(qty) qty FROM report  WHERE stat LIKE 'ขาย%' GROUP BY productcategory ORDER BY qty DESC 
";

$result = mysqli_query($conn,$sql);



?>
<html>
<head>

<title></title>

</head>
<body style="background-color:#E1E5EA;"->

<?php include 'indexform.php';?>


<div class="table">
<table class="table  table-primary" >
  <tr>
    <thead>


    <th scope="col">สินค้า</th>
    <th scope="col">จำนวน</th>

</tr>
</thead>
<tbody>
  <?php 

  while($row=mysqli_fetch_assoc($result)){
    ?>

 
</tbody>
  <tr>
  <td><?php echo $row["productcategory"]?></td>
    <td><?php echo $row["qty"]?></td>
   





</td>


  </tr>
 

  <?php } ?>








</body>
<?php
$sql = "SELECT productcategory,qty,SUM(qty) qty FROM report  WHERE stat LIKE 'ขาย%' GROUP BY productcategory ORDER BY qty DESC 
";



$result = mysqli_query($conn,$sql);
 
 if (!$result) {
     die('<p><strong style="color:#FF0000">!! Invalid query:</strong> ' . $mysqli->error.'</p>');
 }
 ?>
 <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
 <script src="https://code.highcharts.com/highcharts.js"></script>
 <script type="text/javascript">
  $(function () {
     $('#piechart').highcharts({
         chart: {
             plotBackgroundColor: null,
             plotBorderWidth: null,
             plotShadow: false,
             type: 'pie'
         },
         title: {
             text: 'ยอดขาย'
         },
         tooltip: {
             pointFormat: '{series.name}: <b>{point.y:,.0f}  ({point.percentage:.1f}%)</b>'
         },
         plotOptions: {
             pie: {
                 allowPointSelect: true,
                 cursor: 'pointer',
                 dataLabels: {
                     enabled: true,
                     format: '<b>{point.name}</b>: {point.y:,.0f} (<strong>{point.percentage:.1f} %</strong>)',
                     style: {
                         color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                     }
                 }
             }
         },
   credits: {
    enabled: false
   },
         series: [{
             name: "Total",
             colorByPoint: true,
             data: [
    <?php
    $c_field = $result->field_count-1;
     $c=0; while($row = $result->fetch_array(MYSQLI_NUM)){ $c++; ?>
    <?php if($c>1){ ?>,<?php } ?>
     {
      name: "<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row[0]))))); ?>",
      y: <?php echo $row[$c_field]; ?>
     }
    <?php } ?>
    ]
         }]
     });
 });
 </script>
 <!--แสดงกราฟ-->
 <div id="piechart"></div>

</html>