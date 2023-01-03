<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<html>
<head>
<title></title>

</head>
<body>
<h2 class="text-center">แก้ไขข้อมูล</h2>

<form action="insertdatamin.php" method="post">
<div class="form-group">
        <label for="">รหัสพนักงาน</label>
        <input type="text" name="userID" id="UserID">
</div>
<div class="form-group">
        <label for="">รหัสผ่าน</label>
        <input type="text" name="password" id="password">
</div>
<div class="form-group">
        <label for="">ชื่อ</label>
        <input type="text" name="firstname" id="firstname">
</div>
<div class="form-group">
        <label for="">นามสกุล</label>
        <input type="text" name="lastname" id="lastname">
</div>
<div class="form-group">

        <label for="">ที่อยู่</label>
        <input type="text" name="addr" id="addr">
</div>
<div class="form-group">

        <label for="">เบอร์โทร</label>
        <input type="text" name="Tel" id="tel">
</div>
<div class="form-group">

        <label for="">ตำแหน่ง</label>
        <input type="text" name="pos" id="pos">
</div>
<br>

     <input type="submit" class="btn btn-primary" value="บันทึก">
     <a href= "index.php" class="btn btn-primary">กลับหน้าแรก</a>

</form>

    </tr>
</table>
<br>
</form>
</body>

</html>