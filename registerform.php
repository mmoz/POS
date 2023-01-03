<html>
<head>
<title>สมัครสมาชิก</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php require('bootstrap.php'); ?>

<body>
<div style="width:60%; margin:0px auto;"> 

<form name="form1" method="post" action="regisdata.php"><br><br>
  <center>สมัครสมาชิก <br></center><br><br>
  <table class="table table-striped">
    <tbody>
      <tr>
        <td width="125"> &nbsp;<l style="color:red">*</l>
ชื่อผู้ใช้</td>
        <td width="180">
          <input name="txtusername" type="text" id="txtusername" size="20">
        </td>
      </tr>
      <tr>
        <td> &nbsp;<l style="color:red">*</l>
รหัสผ่าน</td>
        <td><input name="txtpassword" type="password" id="txtpassword">
        </td>
      </tr>
      <tr>
        <td> &nbsp;<l style="color:red">*</l>
ยืนยันรหัสผ่าน</td>
        <td><input name="txtconpassword" type="password" id="txtconpassword">
        </td>
      </tr>
      <tr>
        <td>&nbsp;<l style="color:red">*</l>
ชื่อ</td>
        <td><input name="txtfirstname" type="text" id="txttxtfirstname" size="35"></td>
</tr>
<tr>
        <td>&nbsp;<l style="color:red">*</l>
นามสกุล</td>
        <td><input name="txtlastname" type="text" id="txtlastname" size="35"></td>
      </tr>
      <tr>
        <td>&nbsp;<l style="color:red">*</l>
ที่อยู่</td>
        <td><textarea name="txtaddress" type="text" id="txtaddress" size="35"></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;<l style="color:red">*</l>
รหัสไปรษณีย์</td>
        <td><input name="txtpost" type="text" id="txtpost" size="35" maxlength="10"></td>
      </tr>
      <tr>
        <td>&nbsp;<l style="color:red">*</l>
เบอร์โทร</td>
        <td><input name="txttel" type="text" id="txttel" size="35" maxlength="10"  onkeyup="check_data()"pattern="[0-9]{10}"
        oninvalid="this.setCustomValidity('โปรดกรอกตัวเลข')" oninput="setCustomValidity('')"></td>
      </tr>



      
    </tbody>
  </table>
  <br>
  <center><input type="submit" name="Submit" value="ยืนยัน"></center>
</form>
<center><input type="submit" name="Submit" value="ย้อนกลับ" onclick="window.history.back();"></center>

</div>
</body>

<script>
<!-- Begin
function check_data()
{
var num = /^([0-9])+$/;

if (!(num.test(document.all.text1.value)))
{
alert("กรุณากรอกเป็นตัวเลขด้วย");
document.all.text1.select();
return false;
}
}
</script>
</html>