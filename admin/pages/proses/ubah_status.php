<?php session_start();
if (ISSET($_SESSION['kasirlogin']))
{
require("../../config.php");
$perintah = "UPDATE `order` set status_id = '2' where no_order = '".$_GET['no']."' ";
$result = mysql_query($perintah);
	if ($result) {
		header("location:../../home_kasir.php?page=order");
	} else { echo "Data belum dapat di ubah!!"; 
	}
}
?>