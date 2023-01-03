<?php
ob_start();
session_start();
	
if(!isset($_SESSION["intLine"]))
{
	if(isset($_POST["txtproductID"]))
	{
		 $_SESSION["intLine"] = 0;
		 $_SESSION["strproductID"][0] = $_POST["txtproductID"];
		 $_SESSION["strQty"][0] = $_POST["txtQty"];

		 header("location:show.php");
	}
}
else
{
	
	$key = array_search($_POST["txtproductID"], $_SESSION["strproductID"]);
	if((string)$key != "")
	{
		//  $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + $_POST["txtQty"];
	}
	else
	{
		
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strproductID"][$intNewLine] = $_POST["txtproductID"];
		 $_SESSION["strQty"][$intNewLine] = $_POST["txtQty"];
	}
	
header("location:javascript://history.go(-1)");

}
?>

<?php /* This code download from www.ThaiCreate.Com */ ?>