<?php require("connect.php");  ?>
<?php

if($_GET["Action"] == "Save")
{
	for($i=1;$i<=$_POST["hdnNo"];$i++)
	{	
		$calsql = "UPDATE product SET ";
		$calsql .="remainunit = remainunit-'".$_POST["txtqty$i"]."' ";
		$calsql .="WHERE productID = '".$_POST["hdnproductID$i"]."' ";
		$dataQuery = mysqli_query($conn, $calsql);  
		
		$calsql2 = "INSERT INTO report(productID,productname,productcategory,qty,pricetotal,date,stat)VALUES('".$_POST["txtproductID$i"]."','".$_POST["txtproductname$i"]."','".$_POST["txtproductcategory$i"]."','".$_POST["txtqty$i"]."','".$_POST["txtresult$i"]."','".$_POST["txtdate$i"]."','".$_POST["txtstat$i"]."')";
		$dataQuery2 = mysqli_query($conn, $calsql2);
//txtresult = pricetotal
		$del = "DELETE FROM cart ";
		$dataQuery4 = mysqli_query($conn, $del);
		
	}
	$calsql3 = "INSERT INTO bill(date,total)VALUES('".$_POST["txtorderdate"]."','".$_POST["total"]."')";
	$dataQuery3 = mysqli_query($conn, $calsql3);


}


if($conn){
    echo  " <script>window.location='bill.php'</script>";
    }else{
        echo "Fail";
    }


?>