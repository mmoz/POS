<?php require("connect.php");  ?>
<?php

if($_GET["Action"] == "Save")
{
	for($i=1;$i<=$_POST["hdnNo"];$i++)
	{	
		
		$calsql = "UPDATE product SET ";
		$calsql .="remainunit = remainunit + '".$_POST["txtaddunit$i"]."' ";
		$calsql .="WHERE productID = '".$_POST["hdnproductID$i"]."' ";
		$dataQuery = mysqli_query($conn, $calsql);  
		

		
	}

    $poid=$_POST["txtpoid"];
    $substatus="ยกเลิกคำสั่งซื้อ";
    $calsql3 = "UPDATE orders SET postatus = '$substatus' WHERE order_ID='$poid'";
    $dataQuery3 = mysqli_query($conn, $calsql3);


}




if($conn){
    echo  "<script>window.location='checkorder.php'</script>";
    }else{
        echo "Fail";
    }






?>