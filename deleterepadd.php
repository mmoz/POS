<?php
require('connect.php');


$id=$_POST['reportID']; 

if($_GET["Action"] == "Save")
{
    if($_POST["stat"] == "นำเข้า")
    {
        $sql = "UPDATE product SET ";
        $sql .="remainunit = remainunit-'".$_POST["qty"]."' ";
        $sql .="WHERE productID = '".$_POST["productID"]."' ";
        $result = mysqli_query($conn, $sql);

        $result2 = mysqli_query($conn,$sql = "DELETE FROM report WHERE reportID='$id'");

}else {
    $result2 = mysqli_query($conn,$sql = "DELETE FROM report WHERE reportID='$id'");
}



} 
if($result){
    echo  "บันทึกข้อมูลเรียบร้อย <script>window.location='reportpageadd.php'</script>";
}else{
    echo "เกิดข้อผิดพลาด";

}

?>