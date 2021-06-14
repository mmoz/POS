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

<form action="updatedata.php" method="POST">
<input type="hidden"  value="<?php echo $row["productID"];?>"name ="productID">

    <div>
        <h2 class="text-center">แก้ไขข้อมูล</h2>

        <label for="">ชื่อสินค้า</label>
        <input type="text" name="productname" id="" class="form-control" value="<?php echo $row["productname"];?>">
</div>
<div>
        <label for="">ประเภทสินค้า</label>
        <input type="text" name="productcategory" id="" value="<?php echo $row["productcategory"];?>">
</div>
<div>
        <label for="">จำนวนคงเหลือ</label>
        <input type="text" name="remainunit" id="" value="<?php echo $row["remainunit"];?>">
</div>
<div>

        <label for="">ราคา</label>
        <input type="text" name="price" id="" value="<?php echo $row["price"];?>">
</div>

     <input type="submit" value="แก้ไข">
        
</form>

    </tr>
</table>
<br>
</form>
</body>

</html>