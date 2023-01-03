<?php require('connect.php'); ?>



<?php

$sql = "SELECT productname,price from product";




$result = mysqli_query($conn,$sql);






?>


<html>
    <head></head>
    <table>
    <tr>
    <th>ชื่อสินค้า</th>
    <th>ราคา</th>
</tr>
<?php while($row=mysqli_fetch_assoc($result)){?>
<tr>
 <td><?php echo $row["productname"]?></td>
 <td><?php echo $row["price"]?></td>

</tr>
<?php }?>
</table>
</html>

            



























</table>















































</html>
