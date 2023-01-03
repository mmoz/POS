<?php
    require("connect.php");

    $productID = $_POST['productID'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $remainunit = $_POST['remainunit'];
    $productcategory = $_POST['productcategory'];


    $sql = " SELECT productID FROM cart WHERE productID = '$productID' ";
    $result = mysqli_query($conn, $sql);
    $check=mysqli_num_rows($result);

    


?>

<?php 
if($check > 0){
    echo "<script>";
    echo "alert(' สินค้าอยู่ในออร์เดอร์แล้ว !');";
    echo "window.history.back();";
    echo "</script>";
}else{
    
    if ($remainunit == 0){
        echo "<script>";
        echo "alert(' สินค้าหมด !');";
        echo "window.history.back();";
        echo "</script>";

    }else{
        mysqli_query($conn, "INSERT INTO cart (productID,productname,productcategory,price,remainunit) VALUES ('$productID','$productname','$productcategory','$price','$remainunit')");
    } 

}



?>

<?php 
if($conn){
echo  "<script>window.location='pos.php'</script>";
}else{
    echo "เกิดข้อผิดพลาด";
}

?>