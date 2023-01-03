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
<form action="updatedetaildata.php" method="POST"  enctype="multipart/form-data">
<input type="hidden"  value="<?php echo $row["productID"];?>"name ="productID">

    <div>
        <h2 class="text-center">แก้ไขข้อมูล</h2>


        <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <textarea name="detail" id="detail"></textarea>
    <script>
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
    CKEDITOR.replace('detail');
    function CKupdate() {
    for (instance in CKEDITOR.instances)
    CKEDITOR.instances[instance].updateElement();
    }   
</script>    </div>

<tr><td align ="center"><input type="submit" class = "btn btn-primary" value="แก้ไข">
     <a href= "addproductdetail.php" class="btn btn-primary">ย้อนกลับ</a></tr></td>

        
</form>

    </tr>
</table>
<br>
</form>
</body>

</html>