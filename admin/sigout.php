<?php session_start();
if(isset($_SESSION['adminlogin'])){
  unset($_SESSION['adminlogin']);
  header("location:index.php");
}
elseif (isset($_SESSION['kasirlogin'])){
  unset($_SESSION['kasirlogin']);
  header("location:index.php");
}
?>