<?php session_start();
if (ISSET($_SESSION['adminlogin']))
{
header("location:home.php"); 		
}
elseif (ISSET($_SESSION['kasirlogin']))
{
header("location:home_kasir.php"); 		
}
else
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>LOGIN ADMIN</title>
  
  
  
      <link rel="stylesheet" href="css/style_login.css">

  
</head>

<body>
  <div class="vid-container">
  <div class="bgvid" class="back" >
      <p align="center"><img src="images/img login/Desert.jpg"></p>
  </div>
  <div class="inner-container">
    <div class="box">
    <?php 
		include "pages/tampil_login.php";
	?>
    </div>
  </div>
</div>

</body>
</html>
