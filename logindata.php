<?php
session_start();
if(isset($_POST['userID'])){
          require("connect.php");
          $userID = $_POST['userID'];
          $password = ($_POST['password']);
          $sql="SELECT * FROM user Where username='".$userID."' AND password='".$password."' ";

        
          $result = mysqli_query($conn,$sql);
          
        
         if(mysqli_num_rows($result)==1){

              $row = mysqli_fetch_array($result);

              $_SESSION["username"] = $row["username"];
              $_SESSION["firstname"] = $row["lastname"];
              $_SESSION["role"] = $row["role"];

              if($_SESSION["role"]=="a"){ 

                Header("Location: index.php");

              }

              if ($_SESSION["role"]=="e"){  

                Header("Location: index.php");

              }

          }else{
            echo "<script>";
                echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                echo "window.history.back()";
            echo "</script>";

          }

}else{


     Header("Location: login.php"); 

}
      

?>
