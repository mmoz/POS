<?php require("connect.php");  ?>
<?php

if($_GET["Action"] == "Save")
{
	for($i=1;$i<=$_POST["hdnNo"];$i++)
	{	
		
		// $calsql = "UPDATE product SET ";
		// //$strSQL .="productID = '".$_POST["txtproductID$i"]."' ";
		// //$strSQL .=",productName = '".$_POST["txtproductName$i"]."' ";
		// $calsql .="remainunit = remainunit-'".$_POST["txtqty$i"]."' ";
		// $calsql .="WHERE productID = '".$_POST["hdnproductID$i"]."' ";
		// $dataQuery = mysqli_query($conn, $calsql);  
		
		$calsql2 = "INSERT INTO report(productID,productname,productcategory,date,qty,pricetotal,stat)VALUES('".$_POST["txtproductID$i"]."','".$_POST["txtproductname$i"]."','".$_POST["txtproductcategory$i"]."','".$_POST["txtdate$i"]."','".$_POST["txtqty$i"]."','".$_POST["total$i"]."','".$_POST["txtstat$i"]."')";
		$dataQuery2 = mysqli_query($conn, $calsql2);

      


		
	}
    $poid=$_POST["txtpoID"];
    $substatus="ยืนยันแล้ว";
    $calsql3 = "UPDATE orders SET postatus = '$substatus' WHERE order_ID='$poid'";
    $dataQuery3 = mysqli_query($conn, $calsql3);



}

if($conn){
    echo  "save <script>window.location='checkorder.php'</script>";
    }else{
        echo "Fail";
    }






?>