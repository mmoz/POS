<?php require("connect.php");  ?>  

<html>
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="theme.css">

    <title>Dashboard</title>

</head>

<body OnLoad="document.form1.submit();"> 

  
<?php

$id=$_GET["id"];
$sql="SELECT * FROM product WHERE productID=$id";
$result = mysqli_query($conn,$sql);
$dataTranfer=mysqli_fetch_assoc($result)

?>
<header class="p-3 bg-dark text-white">
    
    <center><h1>แก้ไขข้อมูลสินค้า</h1></center>
</header>




<form name="form1" action="cartpc.php" method="post" >

<input type="hidden"  value="<?php echo $dataTranfer["productID"];?>"name ="productID">
<br>
<table  align="center">
<td>
 
   

    <div class="mb-3">
    <label for="exampleInput" class="form-label">ชื่อสินค้า</label>
    <input class="form-control" type="text" name="productname" value="<?php echo $dataTranfer['productname']?>">
    </div>
    <div class="mb-3">
    <label for="exampleInput" class="form-label">ประเภทสินค้า</label>
    <input class="form-control" type="text" name="productcategory" value="<?php echo $dataTranfer['productcategory']?>">         
    </div>
    <div class="mb-3">
    <label for="exampleInput" class="form-label">จำนวนที่เหลือ</label>
    <input class="form-control" type="text" name="remainunit" value="<?php echo $dataTranfer['remainunit']?>">
    </div>
    <div class="mb-3">
    <div class="mb-3">
    <label for="exampleInput" class="form-label">ราคาขาย</label>
    <input class="form-control" type="text" name="price" value="<?php echo $dataTranfer['price']?>">
    </div>
    <div class="mb-3" align="center">
  <button type="submit" class="btn btn-primary" value="Complete">ยืนยัน</button>
  <a href="javascript:history.back()"><button type="button" class="btn btn-danger" >ยกเลิก</button></a>
  </div>
</td>
</table>


    
    </body>
</html>