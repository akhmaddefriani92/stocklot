<?php session_start();
include ("../../config.php");
$user = $_POST['username'];
$pass = $_POST['password'];

// $query = "select * from admin where username='".$user."' and password='".md5($pass)."'";
$query = "select * from admin where username='".$user."' and password='".($pass)."'";

$db = mysql_query($query);
$akses = mysql_fetch_array($db);
// print_r($akses);
$level = $akses['level'];	

if ( $level == '1'){
		$_SESSION['adminlogin']=$user;
			
echo "<script>alert('Selamat Datang Dihalaman Admin')</script>";
echo "<meta http-equiv='refresh' content='0;url=../../dashboard.php'>";
}
elseif ($level == '2')  {
$_SESSION['kasirlogin']=$user;
			
echo "<script>alert('Selamat Datang Dihalaman Kasir')</script>";
echo "<meta http-equiv='refresh' content='0;url=../../home_kasir.php'>";
}
else {
	
	print_r($akses);
	/*echo "<script>alert('Maaf Akses Ditolak, Mohon untuk Cek Username dan Password Anda')</script>";
echo "<meta http-equiv='refresh' content='0;url=../../index.php'>";*/

}
?>