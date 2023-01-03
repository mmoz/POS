<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<html>
<head>
<title></title>

</head>
<body>
<h2 class="text-center">เพิ่มข้อมูล</h2>
<table align ="center">
<form action="insertdata.php" method="post" enctype="multipart/form-data">
<div class="row mb-3">

        <tr>
        <td align ="center"><label for="" class="" >ชื่อสินค้า</tr></td>
        <tr><td align ="center"><input type="text" name="productname" ></label></td></tr>
        <tr><td align ="center"><label for="">รูปภาพ</tr></td>
        <tr><td align ="center"><input type="file" name="pic" /></label></td></tr>
        <tr><td align ="center"><label for="">ประเภทสินค้า</tr></td>
        <tr><td align ="center"><input list="catage" name="productcategory" ></label></tr></td>
        <datalist id="catage">
        <option value="อาหาร">
        <option value="ธูป/เทียน">
        <option value="ชุดน้ำชา">
        <option value="กระดาษไหว้">

</datalist>



<!-- <tr><td align ="center"><label for="">จำนวนคงเหลือ</tr></td>
<tr><td align ="center"><input type="number" name="remainunit" ></label></tr></td> -->

<tr><td align ="center"><label for="">ราคา</tr></td>
        <tr><td align ="center"><input type="number" name="price" ></label></tr></td>
        <br>
</div>
<tr><td align ="center"> <input type="submit" class="btn btn-primary" value="บันทึก">
     <a href= "index.php" class="btn btn-primary">กลับหน้าแรก</a><tr></td>

        
</form>
</table>
    </tr>
<br>
</form>
</body>


</html>