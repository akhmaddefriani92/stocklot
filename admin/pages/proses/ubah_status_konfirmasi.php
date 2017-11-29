<?php session_start();
if (ISSET($_SESSION['kasirlogin']))
{
require("../../config.php");

$query = mysql_query("select * from `order` where no_order = '".$_GET['no']."'");
$data = mysql_fetch_array($query);

if ($data){
$query2 = mysql_query("select * from notifikasi where order_id = '".$data['order_id']."'");
$data2 = mysql_fetch_array($query2);

if ($data2){
$tgl = date("Ymd");
$query1 = mysql_query("update notifikasi set tgl_kirim = '$tgl' where idkonfirmasi = '".$data2['idkonfirmasi']."'");

if ($query1){
$perintah = "UPDATE `order` set status_id = '3' where order_id = '".$data2['order_id']."' ";
$result = mysql_query($perintah);
	if ($result) {
		header("location:../../home_kasir.php?page=kirim");
	} else { echo "Data belum dapat di ubah!!"; 
	}
}
else { echo "Data belum dapat di ubah!!"; 
	}
}
}
}
?>