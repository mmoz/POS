<!-- 
     <?php 
/*error_reporting(0);
ini_set('display_errors', 0); 
?> 
<nav class="navbar navbar-expand-lg navbar-dark" style ="background-color:#1C1C1C">
  <a class="navbar-brand" href="#">&nbsp;&nbsp;</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="indexuser.php">หน้าแรก <span class="sr-only"></span></a>
      </li>
      
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           หมวดหมู่สินค้า
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="productcate1.php">อาหาร</a>
          <a class="dropdown-item" href="productcate2.php">ธูป/เทียน</a>
          <a class="dropdown-item" href="productcate3.php">ชุดน้ำชา</a>
          <a class="dropdown-item" href="productcate4.php">กระดาษไหว้</a>

        </div>
      </li>
      <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="contactus.php">ติดต่อเรา <span class="sr-only"></span></a>
      </li>
         <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="indexuser.php">แจ้งชำระเงิน <span class="sr-only"></span></a>
      </li> -->
      
      <li class="nav-item">
        <a class="nav-link" href=""></a>
      </li>
      
      <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           รายงาน
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href=""></a>
          <a class="dropdown-item" href=""></a>
          <a class="dropdown-item" href=""></a>
          <a class="dropdown-item" href=""> </a>
          <a class="dropdown-item" href=""> </a>
          <a class="dropdown-item" href=""> </a>
        </div>
      </li> -->
    </ul>
  </div>
  
  <div class="btn-group dropstart">
  
      <?php 

if($_SESSION['username'] != NULL)
{

?>

<ul class="nav navbar-nav navbar-right">


      <li class="nav-item active">
        <a class="nav-link" href="show.php">ตะกร้าสินค้า <span class="sr-only"></span></a>
</li>
      <ul class="navbar-nav ">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['username']; ?>
          </a>
          
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="usersdatadetail.php?id=<?php echo $_SESSION["usersreg_ID"];?>">ข้อมูลลูกค้า</a></li>
          <li><a class="dropdown-item" href="usersdetail.php?id=<?php echo $_SESSION["usersreg_ID"];?>">รายละเอียดการสั่งซื้อ</a></li>
          <li><a class="dropdown-item" href="logoutusers.php">ออกจากระบบ</a></li>
          </ul>
          
        </li>
      
      </ul>
      


<?php 
    }
else{
?>

  <ul class="navbar-nav ">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            เข้าสู่ระบบ
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="loginuser.php">เข้าสู่ระบบ</a></li>
          <li><a class="dropdown-item" href="registerform.php">สมัครสมาชิก</a></li>
          </ul>
        </li>
      </ul>
    


<?php
}
?>
      </ul>
</div>
     
      



</nav>


<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script> 

<script>
$(function(){   // เรียกใช้ตอนโหลดหน้าเสร็จ
  $("#searhbox").keyup(function(){          // ถ้ามี keyup ที่ input  ID = searchbox
        
       if($(this).val().length>3)     //  ถ้าค่าใน searchbox ยาวกว่า 3 
          {

           $.post("search.php",{key:$(this).val()},function(result){   ///  ส่งค่าไปที่  search.php แบบ post  ตัวแปร key เก็บค่า searchbox
             
               $("#resultDiv").html(result);   // เอาค่าที่ส่งกลับมา แสดงที่ element ที่มี id = resultDiv
             })  
         }else{
           
              return false;   // ถ้าค่าใน searchbox น้อยกว่า 3  ไม่ต้องทำไร

        }
   })

})

</script> -->