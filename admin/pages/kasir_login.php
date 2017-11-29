<?php 
if(isset($_SESSION['kasirlogin'])) {
	include "config.php";
	$user = $_SESSION['kasirlogin'];
	$sql = mysql_query("select * from admin where username = '".$user."'");
	$cari = mysql_fetch_array($sql);
	echo "<Font color=\"Blue\">".$cari['nama'];
}
?>