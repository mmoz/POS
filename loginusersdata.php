<?php
    require("connect.php");
?>


<?php
session_start();
if(isset($_POST['username'])){
          $username = $_POST['username'];
          $password = ($_POST['password']);
          $sql="SELECT * FROM usersreg Where username='".$username."' AND password='".$password."' ";


          $result = mysqli_query($conn,$sql);


         if(mysqli_num_rows($result)==1){

              $row = mysqli_fetch_array($result);

              $_SESSION["username"] = $row["username"];
              $_SESSION["usersreg_ID"] = $row["usersreg_ID"];

              if($_SESSION["username"]!= NULL){ 
                
                Header("Location: indexuser.php");


              }


          }else{
            echo "<script>";
            echo "alert('ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง กรุณากรอกใหม่');"; 
            echo "window.history.back()";
            echo "</script>";

          }

}else{


     Header("Location: loginuser.php"); 

}


?>