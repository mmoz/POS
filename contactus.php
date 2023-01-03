<!DOCTYPE html>
<html lang="en">
  
<head>
  <title>หน้าแรก</title>
<?php include 'bootstrap.php' ?>

  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

    body {
  background-color: #F8F8FF		;
}
    
.right {
  float: right;
  width: 300px;
  border: 3px solid #73AD21;
  padding: 10px;
}
.left {
  float: left;
  width: 300px;
  border: 3px solid #73AD21;
  padding: 10px;
}
  </style>
  
</head>
<?php
session_start();
require('connect.php');

?>

<body>


<?php include 'banner.php' ; ?>

<?php include 'navbar.php';?>
<center>
      <h3>ติดต่อเรา</h3>
</center>
<div style="width:80%; margin:0px auto;"> 

<br>
<div align="left">
    <h6>ที่อยู่: 71/14 เพชรเกษม 81/1 เขตหนองแขม แขวงหนองค้างพลู กรุงเทพ 10160</h6>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.2239764429783!2d100.34010561474122!3d13.704880302071663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e295fba4ca9f5b%3A0x6cf9a9bc0f4960c9!2zNzEg4LiL4Lit4LiiIOC5gOC4nuC4iuC4o-C5gOC4geC4qeC4oSA4MS8xIOC5geC4guC4p-C4hyDguKvguJnguK3guIfguITguYnguLLguIfguJ7guKXguLkg4LmA4LiC4LiV4Lir4LiZ4Lit4LiH4LmB4LiC4LihIOC4geC4o-C4uOC4h-C5gOC4l-C4nuC4oeC4q-C4suC4meC4hOC4oyAxMDE2MA!5e0!3m2!1sth!2sth!4v1633274373750!5m2!1sth!2sth" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
    <h6>เบอร์โทร: 098-8905791</h6><br>
    <h6>LineID: batsusakami5</h6><br>
    <h6>Email: zackmmo@gmail.com</h6><br>
    <h6>Facebook:<a href="https://www.facebook.com/batsu.sakami.5">Facebook</a></h6><br>

</div>

</body>

</html>
