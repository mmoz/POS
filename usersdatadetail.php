<?php require("connect.php");   ?> 
<?php require("bootstrap.php");   ?> 
<?php session_start();   ?> 
<?php include 'banner.php' ; ?>

<?php include 'navbar.php';?>




<?php  

$id = $_SESSION['usersreg_ID']; 
$data = "SELECT *  FROM orders WHERE usersreg_ID = $id";
$dataQuery = mysqli_query($conn, $data);
?>

<?php

$id=$_SESSION['usersreg_ID'];
$strSQL2 = "SELECT * FROM usersreg WHERE usersreg_ID = $id ";
$objQuery2 = mysqli_query($conn, $strSQL2) or die(mysql_error());
$objResult2 = mysqli_fetch_array($objQuery2)

?>
<center>
<br>
ข้อมูลลูกค้า
<form action="updateusers.php" method="POST">

<br> <br>
<div style="width:50%">
<table width="304" class="table table-striped">

<!-- <input type="hidden"  value='<?php echo $row['usersreg_ID'];?>'name ='usersreg_ID'> -->

    <tr>
      <td width="71">ชื่อ</td>
      <td width="217"><input type="text" name="txtname" value="<?php echo $objResult2["firstname"]; ?>" ></td>
    </tr>
    <tr>
      <td width="71">นามสกุล</td>
      <td width="217"><input type="text" name="txtsurname" value="<?php echo $objResult2["lastname"]; ?>"></td>
    </tr>
    <tr>
      <td>ที่อยู่</td>
      <td><textarea name="txtaddress"><?php echo $objResult2["address"]; ?> </textarea></td>
    </tr>
    <tr>
      <td width="71">รหัสไปรษณีย์</td>
      <td width="217"><input type="text" name="txtpost" value="<?php echo $objResult2["post"]; ?>" ></td>
    </tr>
    <tr>
      <td>เบอร์โทร</td>
      <td><input type="int" name="txttel" value="<?php echo $objResult2["tel"]; ?>"maxlength="10"></td>
    </tr>
    <tr>
      <td colspan="4"><input type="hidden" name="txtcusID" value="<?php echo $objResult2["usersreg_ID"]; ?>"></td>
    </tr>

  </table>
  <input type="submit" class = "btn btn-primary" value="แก้ไขข้อมูล">

</center>
</form>


</div>
<?php include 'footer.php';?>
