<?php
require('connect.php');
$dir ="uploads/";
$fileImage = $dir . basename($_FILES["pic"]["name"]);
if (move_uploaded_file($_FILES["pic"]["tmp_name"],$fileImage)){
    echo"เสร็จ";
}else{
        echo"ผิด";
    }
    ?>