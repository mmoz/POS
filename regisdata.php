<?php
	require('connect.php');
	
	if(trim($_POST["txtusername"]) == "")
	{
        echo "<script>";
        echo "alert('โปรดกรอกข้อมูลให้ครบ');";
        echo "</script>";
        echo  "save <script>window.location='registerform.php'</script>";
		exit();	
	}
	
	if(trim($_POST["txtpassword"]) == "")
	{
		echo "Please input Password!";
        echo "<script>";
        echo "alert('โปรดกรอกข้อมูลให้ครบ');";
        echo "</script>";
        echo  "save <script>window.location='registerform.php'</script>";
        
		exit();	
	}	
		
	if($_POST["txtpassword"] != $_POST["txtconpassword"])
	{
        echo "<script>";
        echo "alert('รหัสผ่านไม่ตรงกัน');";
        echo "</script>";
        echo  "save <script>window.location='registerform.php'</script>";
		exit();
	}
	
	if(trim($_POST["txtfirstname"]) == "")
	{
        echo "<script>";
        echo "alert('โปรดกรอกข้อมูลให้ครบ');";
        echo "</script>";
        echo  "save <script>window.location='registerform.php'</script>";
		exit();	
	}	
    if(trim($_POST["txtlastname"]) == "")
	{
        echo "<script>";
        echo "alert('โปรดกรอกข้อมูลให้ครบ');";
        echo "</script>";
        echo  "save <script>window.location='registerform.php'</script>";
		exit();	
	}	
    if(trim($_POST["txtaddress"]) == "")
	{
        echo "<script>";
        echo "alert('โปรดกรอกข้อมูลให้ครบ');";
        echo "</script>";
        echo  "save <script>window.location='registerform.php'</script>";
		exit();	
	}	
    if(trim($_POST["txttel"]) == "")
	{
        echo "<script>";
        echo "alert('โปรดกรอกข้อมูลให้ครบ');";
        echo "</script>";
        echo  "save <script>window.location='registerform.php'</script>";
		exit();	
	}	
    
	
	$strSQL = "SELECT * FROM usersreg WHERE username = '".trim($_POST['txtusername'])."' ";
	$objQuery = mysqli_query($conn,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
        echo "<script>";
        echo "alert('มีชื่อผู้ใช้นี้แล้ว');";
        echo "</script>";
        echo  "save <script>window.location='registerform.php'</script>";


	}
	else
	{	
		
		$strSQL = "INSERT INTO usersreg (username,password,firstname,lastname,address,tel,post) VALUES ('".$_POST["txtusername"]."', 
		'".$_POST["txtpassword"]."','".$_POST["txtfirstname"]."','".$_POST["txtlastname"]."','".$_POST["txtaddress"]."','".$_POST["txttel"]."','".$_POST["txtpost"]."')";
		$objQuery = mysqli_query($conn,$strSQL);
		
		echo "<script>";
        echo "alert('สมัครเสร็จสิ้น');";
        echo "</script>";
        echo  "save <script>window.location='loginuser.php'</script>";
		
	}

?>