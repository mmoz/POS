<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<?php
require("connect.php");
$id=$_GET['id'];
$sql="SELECT * FROM users WHERE userID='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>
<html>
<head>
<title></title>

</head>
<body>

<form action="updatedatamin.php" method="POST">
<input type="hidden"  value='<?php echo $row['userID'];?>'name ='userID'>

    <div>
        <h2 class="text-center">แก้ไขข้อมูล</h2>

</div>
<div>
        <label for="">ชื่อ</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $row["firstname"];?>">
</div>
<div>
        <label for="">นามสกุล</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo $row["lastname"];?>">
</div>
<div>
        <label for="">รหัสผ่าน</label>
        <input type="text" name="password" id="password" value="<?php echo $row["password"];?>">
</div>
<div>

        <label for="">ที่อยู่</label>
        <input type="text" name="addr" id="addr" value="<?php echo $row["addr"];?>">
</div>
<div>
        <label for="">เบอร์โทรศัพท์</label>
        <input type="text" name="Tel" id="Tel" value="<?php echo $row["Tel"];?>">
</div>
<div>
        <label for="">ตำแหน่ง</label>
        <input type="text" name="pos" id="pos" value="<?php echo $row["pos"];?>">
</div>

     <input type="submit" class = "btn btn-primary" value="แก้ไข">
     <a href= "indexadmin.php" class="btn btn-primary">กลับหน้าแรก</a>

        
</form>

    </tr>
</table>
<br>
</form>
</body>

</html>