<?php require('connect.php');
?>
<?php
session_start();


  $Total = 0;
  $SumTotal = 0;



  $strSQL = "INSERT INTO orders (usersreg_ID,OrderDate,firstname,lastname,address,post,Tel,postatus)
	VALUES
	('".$_POST["txtusersreg_ID"]."','".date("Y-m-d H:i:s")."','".$_POST["txtfirstname"]."','".$_POST["txtlastname"]."' ,'".$_POST["txtaddress"]."','".$_POST["txtpost"]."','".$_POST["txttel"]."','".$_POST["postatus"]."')";

  mysqli_query($conn,$strSQL) or die(mysqli_error($conn));

  

  $strOrderID = mysqli_insert_id($conn);

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strproductID"][$i] != "")
	  {
			  $strSQL = "INSERT INTO orders_detail (order_ID,productID,Qty)
				VALUES
				('".$strOrderID."','".$_SESSION["strproductID"][$i]."','".$_SESSION["strQty"][$i]."') 
			  ";
			
			  mysqli_query($conn,$strSQL)or die(mysqli_error($conn));


      $strSQL2 = "UPDATE product SET remainunit = remainunit - '".$_SESSION["strQty"][$i]."' WHERE productID = '".$_SESSION["strproductID"][$i]."'
          ";
                $result =  mysqli_query($conn,$strSQL2) or die(mysql_error($conn));
                $_SESSION["strproductID"][$i] = "";
                $_SESSION["strQty"][$i] = "";
	  }
    
  }
  

  if($strSQL)
	{
        echo "<script>";
        echo "alert('สั่งซื้อเสร็จสิ้น');";
        echo "</script>";
		echo  "save <script>window.location='indexuser.php'</script>";



	}


?>