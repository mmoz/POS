<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<?php
require("connect.php");
$id=$_GET["id"];
$sql="SELECT * FROM product WHERE productID=$id";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result)


?>
<html>
<head>
<title></title>

</head>
<body>
<table align="center">
<form action="updatedata.php" method="POST"  enctype="multipart/form-data">
<input type="hidden"  value="<?php echo $row["productID"];?>"name ="productID">
    <div>
        <h2 class="text-center">แก้ไขข้อมูล</h2>

        <tr><td align ="center"><label for="">ชื่อสินค้า</label></tr></td>
        <tr><td align ="center"><input type="text" name="productname" id=""  value="<?php echo $row["productname"];?>"></tr></td>
</div>

<tr><td align ="center"><label for="">รูปภาพ</label></tr></td>
<tr><td align ="center"><input type="file" name="pic" value="<?php echo $row["pic"]; ?>"  /><tr><td align ="center"><img src="uploads/<?php echo $row["pic"]; ?>" width="150px" height="100px"></tr></td></tr></td>
<div>
<tr><td align ="center"><label for="">ประเภทสินค้า</label></tr></td>
<tr><td align ="center"><input list="catageup" name="productcategory" id="" value="<?php echo $row["productcategory"];?>"></tr></td>
        <datalist id="catageup">
        <option value="ธูป/เทียน">
        <option value="อาหาร">
        <option value="ชุดน้ำชา">
        <option value="กระดาษไหว้">

</datalist>
     
</div>

<div>
<tr><td align ="center"><label for="">จำนวนคงเหลือ</label></tr></td>
<tr><td align ="center"><input type="number" name="remainunit" id="" value="<?php echo $row["remainunit"];?>"></tr></td>
</div>
<div>

<tr><td align ="center"><label for="">ราคา</label></tr></td>
<tr><td align ="center"><input type="number" name="price" id="" value="<?php echo $row["price"];?>"></tr></td>
</div>

<tr><td align ="center"><input type="submit" class = "btn btn-primary" value="แก้ไข">
     <a href= "index.php" class="btn btn-primary">กลับหน้าแรก</a></tr></td>

        
</form>

    </tr>
</table>
<br>
</form>
</body>

</html>