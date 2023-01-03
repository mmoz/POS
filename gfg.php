<?php
  
// Get the user id 
$productname = $_REQUEST['productname'];
  
// Database connection
$conn = mysqli_connect("localhost", "root", "", "warehouse");
  
if ($productname !== "") {
      
    // Get corresponding first name and 
    // last name for that user id    
    $query = mysqli_query($conn, "SELECT price
     FROM product WHERE productname='$productname'");
     if (!$query) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
  
    $row = mysqli_fetch_array($query);
  
    // Get the first name
    $price = $row["price"];
  
    // Get the first name
}
  
// Store it in a array
$result = array("$price");
  
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
