<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<link rel="stylesheet" href="style.css" />




<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Form Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name-"viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="login.Css">

</head>
<body>
<div style="width:70%; margin:0px auto;"> 

<div class="mb-3 row">
      <form name="frmlogin"  method="post" action="logindata.php">
        <p> </p>
        <div class = "container">
        <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
        <p><b>เข้าสู่ระบบ </b></p>
        <p> ชื่อผู้ใช้ :
          <div class = z1>
          <input type="text"   id="userID" required name="userID" placeholder="ชื่อผู้ใช้">
        </p>
        <p>รหัสผ่าน :
          <input type="password"   id="password"required name="password" placeholder="รหัสผ่าน">
        </p>
        <p>
          <button type="submit">เข้าสู่ระบบ</button>
          &nbsp;&nbsp;
          <button type="reset">รีเซ็ต</button>
          <br>
</div>
</div>
</div>
        </p>
      </form>
      </div>
</div>
</body>
</html>
