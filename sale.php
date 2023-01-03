<?php include 'bootstrap.php' ?>


    <head>

<?php

require('connect.php'); 



$sql = "SELECT pricetotal,SUBSTR(date,1,7) AS date_test,SUM(pricetotal) pricetotal FROM report WHERE date GROUP BY MONTH (date) ORDER BY date ASC";


$result=mysqli_query($conn,$sql);





?>

<html>
<head>

<title></title>

</head>
<body style="background-color:#E1E5EA;"->
<?php include 'indexform.php';?>


<div class="tablediv">
<table class="table  table-striped" >
  <tr>
    <thead>


    <th scope="col">เดือนที่</th>
    <th scope="col">ยอดขาย</th>


</tr>
</thead>
<tbody>
  <?php 

  while($row=mysqli_fetch_assoc($result)){
    ?>

 
</tbody>
  <tr>
  <td><?php echo $row["date_test"]?></td>
    <td><?php echo $row["pricetotal"]?></td>
   





</td>


  </tr>
 

  <?php } ?>
  <!-- <a href = "delsale.php?iddel=remove" class="btn btn-danger" onClick = "return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบประวัติ</button></a> -->



</body>
<?php
$sql = "SELECT pricetotal,SUBSTR(date,1,7) AS date_test,SUM(pricetotal) pricetotal FROM report WHERE date GROUP BY MONTH (date) ORDER BY date ASC";


$res_c = mysqli_query($conn,$sql);
 
if (!$res_c) {
    die('<p><strong style="color:#FF0000">!! Invalid query:</strong> ' . $mysqli->error.'</p>');
}
?>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
$(function () {
    $('#barchart').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'ยอดขายรายเดือน'
        },
/*        subtitle: {
            text: ''
        },*/
        xAxis: {
            categories: [
   <?php
   $c_field = $res_c->field_count-1;
    $c=0; while($row = $res_c->fetch_array(MYSQLI_NUM)){ $c++; ?>
   <?php if($c>1){ ?>,<?php } 
   $data[] = $row[$c_field]; 
   ?>
                '<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row[0]))))); ?>'
   <?php } ?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'ยอดขาย'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:25">{point.key}</span><table>',
            pointFormat: '<tr><td style= "font-size:10" "color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:,.0f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
    dataLabels: {
     enabled: true
    }
   }
        },
  credits: {
   enabled: false
  },
        series: [{
            name: 'ยอดขาย',
            data: [<?php echo join(',',$data); ?>]
 
        }]
    });
});
</script>
<!--แสดงกราฟ-->
<div id="barchart"></div>



</html>